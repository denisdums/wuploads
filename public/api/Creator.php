<?php

class Creator
{
    public string $distantUrl;
    public string $localUrl;
    public string $type;
    public array $distantUrlHostParts;
    public string $content;

    public function __construct(string $distantUrl, string $localUrl, string $type)
    {
        $this->importDistantUrl($localUrl);
        $this->localUrl = $distantUrl;
        $this->type = $type;
        $this->initContent();
    }

    private function importDistantUrl(string $distantUrl)
    {
        $this->distantUrl = $distantUrl;
        $this->distantUrlHostParts = explode('.', parse_url($distantUrl)['host']);
    }

    private function initContent()
    {
        $distantUrlParts = $this->getContentDistantUrl();
        $base = $this->getBasePath();
        $this->content = "RewriteEngine On
RewriteBase $base

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{HTTP_HOST} ^$distantUrlParts$
RewriteRule ^(.+)$ $this->localUrl$base$1 [L,R=301,NE]
";
    }

    private function getContentDistantUrl(): string
    {
        $parts = '';
        foreach ($this->distantUrlHostParts as $key => $part) {
            $parts .= $key > 0 ? "\.$part" : $part;
        }
        return $parts;
    }

    private function getBasePath(): string
    {
        switch ($this->type) {
            case 'bedrock':
                $base = '/app/uploads/';
                break;
            case 'themosis':
                $base = '/content/uploads/';
                break;
            default:
                $base = '/wp-content/uploads/';
                break;
        }

        return $base;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}








