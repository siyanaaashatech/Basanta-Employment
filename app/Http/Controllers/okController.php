<?php

public function postSummernote($details)
{
if ($details != '') {
$dom = new \DomDocument();

// this will escape the unescaped-xml
//<w:View>Normal</w:View>
//&lt;w:View&gt;Normal&lt;/w:View&gt;
$details = preg_replace('/<(\w+):(\w+)>/', '&lt;\1:\2&gt;', $details);
    $details = preg_replace('/<\ /(\w+):(\w+)>/', '&lt;/\1:\2&gt;', $details);

        libxml_use_internal_errors(true);
        $dom->loadHtml('
        <meta http-equiv="Content-Type" content="charset=utf-8" />' . $details);
        libxml_clear_errors();
        $images = $dom->getElementsByTagName('img');
        // foreach <img> in the submited message
        foreach ($images as $img) {
        $src = $img->getAttribute('src');
        $src = str_replace('http://127.0.0.1:8000/', 'http://127.0.0.1:8000/', $src);
        $img->removeAttribute('src');
        $img->setAttribute('src', $src);

        // if the img source is 'data-url'
        if (preg_match('/data:image/', $src)) {
        // get the mimetype
        preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
            $mimetype = $groups['mime'];
            // dd($mimetype);
            // Generating a random filename
            $filename = uniqid();
            $filepath = 'uploads/content/' . $filename . '.' . $mimetype;
            // $filepath = 'assets/uploads/content/' . $filename . '.' . $mimetype;
            // $filepath = str_replace('/', DIRECTORY_SEPARATOR, $filepath);

            // dd($filepath);
            // $filepath = public_path('assets/uploads/content/') . $filename;

            // dd(public_path());
            // @see http://image.intervention.io/api/
            $image = Image::make($src)
            // resize if required
            //->resize(300, 200)
            ->encode($mimetype, 100) // encode file to the specified mimetype
            ->save(public_path($filepath));
            // dd($image);
            $new_src = asset($filepath);
            $img->removeAttribute('src');
            $img->setAttribute('src', $new_src);
            }
            }
            // dd('abc');
            $html_cut = preg_replace('~<(?:!DOCTYPE| /?(?:html|body|head|meta))[^>]>\s~i', '', $dom->saveHTML());
                return $html_cut;
                } else {
                return $details;
                }
                }