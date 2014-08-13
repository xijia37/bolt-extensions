<?php

namespace Xijia37\Bolt_extensions\Gist;

class Extension extends \Bolt\BaseExtension
{

    function info() {

        $data = array(
            'name' =>"Gist!",
            'description' => "A small extension to embed Gists, using <code>{{ gist() }}</code> in your templates.",
            'author' => "Bob den Otter",
            'link' => "http://bolt.cm",
            'version' => "1.1",
            'required_bolt_version' => "1.1",
            'highest_bolt_version' => "1.1",
            'type' => "Twig function",
            'first_releasedate' => "2013-03-06",
            'latest_releasedate' => "2013-03-06",
        );

        return $data;

    }

    function initialize() {

        $this->addTwigFunction('gist', 'twigGist');

    }

    function twigGist($gist="") {

        // if $name isn't set, use the one from the config.yml. Unless that's empty too, then use "world".
        if (empty($gist)) {
            return new \Twig_Markup("You must provide a gist to embed.", 'UTF-8');
        }

        if (strpos($gist, ".js") === false) {
            $gist .= ".js";
        }

        $html = sprintf("<script src=\"//gist.github.com/%s\"></script>", $gist);

        return new \Twig_Markup($html, 'UTF-8');

    }

    public function getName(){
        return 'gist';
    }

}
