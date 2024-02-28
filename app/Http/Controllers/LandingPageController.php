<?php

namespace App\Http\Controllers;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\SEOTools;

use Illuminate\Http\Request;
use App\Konten;
use App\Seo;

class LandingPageController extends Controller
{
    public function index()
    {
        
        $konten = Konten::whereNotNull('created_by');
        $seo = Seo::first();
        SEOMeta::setTitle($seo->title);
        SEOMeta::setDescription($seo->description);
        SEOMeta::addMeta('article:published_time', now(), 'property');
        SEOMeta::addMeta('article:section', $seo->content_type, 'property');
        SEOMeta::addKeyword($seo->keywords);

        OpenGraph::setDescription($seo->description);
        OpenGraph::setTitle($seo->title);
        OpenGraph::setUrl(url('/'));
        OpenGraph::addProperty('type', $seo->content_type);
        OpenGraph::addProperty('locale', 'id-id');
        OpenGraph::addProperty('locale:alternate', ['en-us', 'id-id',]);

        OpenGraph::addImage(url('images/landing/'.\App\Helper\CMS::getContent('LND-001','image')));
        OpenGraph::addImage(['url' => url('images/landing/'.\App\Helper\CMS::getContent('LND-001','image')), 'size' => 300]);
        OpenGraph::addImage(url('images/landing/'.\App\Helper\CMS::getContent('LND-001','image')), ['height' => 300, 'width' => 300]);
        // Namespace URI: http://ogp.me/ns/article#
        // article
        OpenGraph::setTitle($seo->title)
            ->setDescription($seo->description)
            ->setType('article')
            ->setArticle([
                'published_time' => '2024-02-28 00:00:00',
                'modified_time' => '2024-02-28 00:00:00',
                'expiration_time' => '2026-02-28 00:00:00',
                'author' => 'Cibunut',
                'tag' => $seo->keywords
            ]);


        return view('landing')->with(['konten' => $konten]);
    }
}
