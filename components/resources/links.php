<?php

namespace Sphp\Core;

$httpRoot = Configuration::httpHost();
//$f5Root = $httpRoot . "/F5/";
//$sidenavLinks["root"] = ["href" => $httpRoot, "text" => "SPHP framework", "target" => "_self"];
$sphp = ["group" => "SPHP framework", "sub" =>
    [
        ["href" => "http://playground.samiholck.com/", "text" => "SPHP Home", "target" => "_self"],
        ["href" => "https://github.com/samhol/SPHP-framework", "text" => "SPHP on GitHub", "target" => "_self"]
    ]
];
Configuration::current()->set("SPHP-links", $sphp);

$sidenavLinks["SPHP"] = ["group" => "SPHP framework", "sub" =>
    [
        ["href" => "http://playground.samiholck.com/", "text" => "SPHP Home", "target" => "_self"],
        ["href" => "https://github.com/samhol/SPHP-framework", "text" => "SPHP on GitHub", "target" => "_self"]
    ]
];
$sidenavLinks["html_basics"] = ["group" => "HTML Basics", "sub" =>
    [
        ["href" => "$httpRoot?page=Sphp.Html", "text" => "Introduction"],
        ["href" => "$httpRoot?page=Sphp.Html.Attributes", "text" => "Attribute management"],
        ["href" => "$httpRoot?page=Sphp.Html.Head", "text" => "Meta data manipulation"],
        ["href" => "$httpRoot?page=Sphp.Html.Media", "text" => "Images, audio and video"],
        ["href" => "$httpRoot?page=Sphp.Html.Programming", "text" => "Scripting and external applications"],
        ["href" => "$httpRoot?page=Sphp.Html.Lists..Tables", "text" => "Lists and Tables"],
        ["href" => "$httpRoot?page=Sphp.Html.Forms", "text" => "Forms"]
    ]
];
$sidenavLinks["foundation6"] = ["group" => "Foundation 6", "sub" =>
    [
        ["href" => "$httpRoot?page=Sphp.Html.Foundation.F6.Core", "text" => "Grids"],
        ["href" => "$httpRoot?page=Sphp.Html.Foundation.F6.Containers", "text" => "Containers"],
        ["href" => "$httpRoot?page=Sphp.Html.Foundation.F6.Navigation", "text" => "Navigation components"],
        ["href" => "$httpRoot?page=Sphp.Html.Foundation.F6.Buttons", "text" => "Buttons"],
    //["href" => "$httpRoot?page=Sphp.Html.Foundation", "text" => "Miscellaneous components"]
    ]
];
$sidenavLinks["data_manipulation"] = ["group" => "Data manipulation", "sub" =>
    [
        ["href" => "$httpRoot?page=Sphp.Data", "text" => "Data Structures"],
        ["href" => "$httpRoot?page=Sphp.Util.datamanipulation", "text" => "Data manipulation"],
        ["href" => "$httpRoot?page=Sphp.Db.Objects", "text" => "Database objects"],
        //["href" => "$httpRoot?page=Sphp.Db", "text" => "Database manipulation"],
        ["href" => "$httpRoot?page=Sphp.Validation", "text" => "Data validation"]
    ]
];
/* $sidenavLinks["other"] = ["group" => "Other features", "sub" =>
  [
  ["href" => "$httpRoot?page=Sphp.Util.System", "text" => "System tools"],
  ["href" => "$httpRoot?page=Sphp.Util.Observers.and.Events", "text" => "Events and Observers"],
  ["href" => "$httpRoot?page=Sphp.Gettext", "text" => "Human language translation"],
  ["href" => "$httpRoot?page=Sphp.Net", "text" => "Network applications"]
  ]
  ]; */


Configuration::current()->set("SIDENAV_LINKS", $sidenavLinks);
$manualLinks = [
   // $sidenavLinks["root"],
    ["separator" => "HTML manipulation:"],
    $sidenavLinks["SPHP"],
    ["separator" => "HTML manipulation:"],
    $sidenavLinks["html_basics"],
    $sidenavLinks["foundation6"],
    ["separator" => "Other features:"],
    $sidenavLinks["data_manipulation"]
];
//$manualLinks = array_merge($manualLinks, $sidenavLinks["other"]["sub"]);
Configuration::current()->set("MANUAL_LINKS", $manualLinks);

//$pageTitles[] = $sidenavLinks["root"];
//$pageTitles = [];
$pageTitles = array_merge([], $sidenavLinks["SPHP"]["sub"], $sidenavLinks["html_basics"]["sub"], $sidenavLinks["foundation6"]["sub"], $sidenavLinks["data_manipulation"]["sub"]
);

Configuration::current()->set("PAGE_TITLES", $pageTitles);
