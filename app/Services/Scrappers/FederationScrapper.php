<?php
namespace App\Services\Scrappers;

use App\Country;
use App\Federation;
use Illuminate\Support\Facades\URL;
use Goutte\Client;

class FederationScrapper implements ScrapperInterface
{
    const ROOT_URL = 'http://www.fih.ch';
    const URL  = self::ROOT_URL . '/inside-fih/our-members/';

    /**
     * @var Client
     */
    private $client;

    private $links;
    private $item;

    function __construct()
    {
        $this->client = new Client();
        $this->links = [];
    }

    function get($level = 2)
    {
        return $this->scrapFromList($level);
    }



    private function scrapFromList($level)
    {
        $crawler = $this->client->request('GET', self::URL);

        $crawler->filter("div.federation_group:nth-of-type({$level}) ul li a")->each(function ($node) {
            $country = strtolower(trim($node->text()));
            $url = self::ROOT_URL . $node->attr('href');
            $this->links [$country] = $this->scrapIndividualData($country, $url);
        });
        return count($this->links);
    }

    private function scrapIndividualData($country, $url)
    {
        $crawler = $this->client->request('GET', $url);

        $this->item = [];
        $this->item['name'] = trim($crawler->filter('h2.sub_title')->first()->text());

        $crawler->filter('div.grid_8 div.body_text table tr')->each(function ($node) {
            @list($type, $value) = explode(':', trim($node->text()));
            if(in_array($type, ['President', 'Address'])){
                $this->item[strtolower($type)] = trim($value);
            }
        });
        $crawler->filter('div.grid_4 ul.info li:last-of-type p')->each(function ($node) {
            $date = \DateTime::createFromFormat(
                'F j, Y',
                trim($node->text())
            );

            if($date){
                $this->item['established_date'] = $date->format('Y-m-d');
            }
        });

        $crawler->filter('div.grid_4 ul.info div.no_wrap')->each(function ($node) {
            $type = $node->children()->eq(0)->text();
            if(in_array($type, ['Email', 'Phone'])){
                $this->item[strtolower($type)] = trim($node->children()->eq(1)->text());
            }
        });

        if(!empty($this->item['president'])){
            $this->item['president_name']  = trim($this->item['president']);
            unset($this->item['president']);
        }
        $this->item['id'] = $this->saveItem($country, $this->item);
        return $this->item;
    }

    private function saveItem($country, $item)
    {
        $country = Country::where('name', $country)->first();
        if(!$country){
            $item['country_id'] = 0;
        } else {
            $item['country_id'] = $country->id;
        }
        $item['created_at'] = date('Y-m-d H:i:s');
        return Federation::insert($item);
    }

    public function message()
    {
        $count = count($this->links);
        return _n('Item imported: %s', 'Items imported: %s', $count, $count) ."\n";
    }
}