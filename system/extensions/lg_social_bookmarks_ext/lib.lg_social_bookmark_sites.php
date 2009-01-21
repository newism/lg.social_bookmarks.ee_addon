<?php
/**
* Social Bookmarking Sites library file
*
* This file contains an multi dimensional associative array of current popular social bookmarking sites.
* Each array element has one sub array with the the following keys:
*
* - favicon: file name of the favicon
* - url: url of the social bookmarking page
*
* This file must be placed in the
* /system/modules/lg_social_bookmarks/lib/ folder in your ExpressionEngine installation.
*
*
* @package LgSocialBookmarks
* @version 2.0.3
* @author Leevi Graham <http://leevigraham.com>
* @see http://leevigraham.com/cms-customisation/expressionengine/addon/lg-social-bookmarks/
* @copyright Copyright (c) 2007-2009 Leevi Graham
* @license http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution-Share Alike 3.0 Unported
*/

return array(

	'ASK' => array(
		'favicon' => 'ask.gif',
		'url' => 'http://myjeeves.ask.com/mysearch/BookmarkIt?v=1.2&amp;t=webpages&amp;url={permalink}&amp;title={title}'
	),

	'BarraPunto' => array(
		'favicon' => 'barrapunto.png',
		'url' => 'http://barrapunto.com/submit.pl?subj={title}&amp;story={permalink}',
	),
	
	'blinkbits' => array(
		'favicon' => 'blinkbits.png',
		'url' => 'http://www.blinkbits.com/bookmarklets/save.php?v=1&amp;source_url={permalink}&amp;title={title}&amp;body={summary}',
	),

	'BlinkList' => array(
		'favicon' => 'blinklist.gif',
		'url' => 'http://www.blinklist.com/index.php?Action=Blink/addblink.php&amp;Url={permalink}&amp;Title={title}',
	),

	'BlogMemes' => array(
		'favicon' => 'blogmemes.png',
		'url' => 'http://www.blogmemes.net/post.php?url={permalink}&amp;title={title}',
	),

	'BlogMemes Fr' => array(
		'favicon' => 'blogmemes.png',
		'url' => 'http://www.blogmemes.fr/post.php?url={permalink}&amp;title={title}',
	),

	'BlogMemes Sp' => array(
		'favicon' => 'blogmemes.png',
		'url' => 'http://www.blogmemes.com/post.php?url={permalink}&amp;title={title}',
	),

	'BlogMemes Cn' => array(
		'favicon' => 'blogmemes.png',
		'url' => 'http://www.blogmemes.cn/post.php?url={permalink}&amp;title={title}',
	),

	'BlogMemes Jp' => array(
		'favicon' => 'blogmemes.png',
		'url' => 'http://www.blogmemes.jp/post.php?url={permalink}&amp;title={title}',
	),

	'blogmarks' => array(
		'favicon' => 'blogmarks.png',
		'url' => 'http://blogmarks.net/my/new.php?mini=1&amp;simple=1&amp;url={permalink}&amp;title={title}',
	),

	'Blogosphere News' => array(
		'favicon' => 'blogospherenews.gif',
		'url' => 'http://www.blogospherenews.com/submit.php?url={permalink}&amp;title={title}',
	),

	'Blogsvine' => array(
		'favicon' => 'blogsvine.png',
		'url' => 'http://blogsvine.com/submit.php?url={permalink}',
	),
	
	'blogtercimlap' => array(
		'favicon' => 'blogter.png',
		'url' => 'http://cimlap.blogter.hu/index.php?action=suggest_link&amp;title={title}&amp;url={permalink}',
	),

	'Blue Dot' => array(
		'favicon' => 'bluedot.png',
		'url' => 'http://bluedot.us/Authoring.aspx?u={permalink}&amp;title={title}',
	),

	'Book.mark.hu' => array(
		'favicon' => 'bookmarkhu.png',
		'url' => 'http://book.mark.hu/bookmarks.php/?action=add&amp;address={permalink}%2F&amp;title={title}',
		'description' => 'description',
	),

	'Bumpzee' => array(
		'favicon' => 'bumpzee.png',
		'url' => 'http://www.bumpzee.com/bump.php?u={permalink}',
	),

	'co.mments' => array(
		'favicon' => 'co.mments.gif',
		'url' => 'http://co.mments.com/track?url={permalink}&amp;title={title}',
	),

	'connotea' => array(
		'favicon' => 'connotea.png',
		'url' => 'http://www.connotea.org/addpopup?continue=confirm&amp;uri={permalink}&amp;title={title}',
	),

	'del.icio.us' => array(
		'favicon' => 'delicious.png',
		'url' => 'http://del.icio.us/post?url={permalink}&amp;title={title}',
	),

	'De.lirio.us' => array(
		'favicon' => 'delirious.png',
		'url' => 'http://de.lirio.us/rubric/post?uri={permalink};title={title};when_done=go_back',
	),

	'Diigo' => array(
		'favicon' => 'diigo.gif',
		'url' => ' http://www.diigo.com/post?url={permalink}&amp;title={title}',
	),

	'Design Float' => array(
		'favicon' => 'designfloat.gif',
		'url' => 'http://www.designfloat.com/submit.php?url={permalink}&amp;title={title}',
	),

	'Digg' => array(
		'favicon' => 'digg.png',
		'url' => 'http://digg.com/submit?phase=2&amp;url={permalink}&amp;title={title}',
		'description' => 'Digg',
	),

	'DotNetKicks' => array(
		'favicon' => 'dotnetkicks.png',
		'url' => 'http://www.dotnetkicks.com/kick/?url={permalink}&amp;title={title}',
		'description' => 'description',
	),

	'DZone' => array(
		'favicon' => 'dzone.png',
		'url' => 'http://www.dzone.com/links/add.html?url={permalink}&amp;title={title}',
		'description' => 'description',
	),

	'eKudos' => array(
		'favicon' => 'ekudos.gif',
		'url' => 'http://www.ekudos.nl/artikel/nieuw?url={permalink}&amp;title={title}',
	),

	'Email' => array(
		'favicon' => 'email_link.png',
		'url' => 'mailto:?subject={title}&body={summary}',
	),

	'Facebook' => array(
		'favicon' => 'facebook.png',
		'url' => 'http://www.facebook.com/sharer.php?u={permalink}&amp;t={title}',
	),

	'Fark' => array(
		'favicon' => 'fark.png',
		'url' => 'http://cgi.fark.com/cgi/fark/edit.pl?new_url={permalink}&amp;new_comment={title}&amp;new_comment={weblog_title}&amp;linktype=Misc'
	),

	'feedmelinks' => array(
		'favicon' => 'feedmelinks.png',
		'url' => 'http://feedmelinks.com/categorize?from=toolbar&amp;op=submit&amp;url={permalink}&amp;name={title}',
	),

	'Furl' => array(
		'favicon' => 'furl.png',
		'url' => 'http://www.furl.net/storeIt.jsp?u={permalink}&amp;t={title}',
	),

	'Fleck' => array(
		'favicon' => 'fleck.gif',
		'url' => 'http://extension.fleck.com/?v=b.0.804&amp;url={permalink}',
	),

	'Global Grind' => array (
		'favicon' => 'globalgrind.gif',
		'url' => 'http://globalgrind.com/submission/submit.aspx?url={permalink}&amp;type=Article&amp;title={title}'
	),
	
	'Google' => array (
		'favicon' => 'googlebookmark.png',
		'url' => 'http://www.google.com/bookmarks/mark?op=edit&amp;bkmk={permalink}&amp;title={title}'
	),
	
	'Gwar' => array(
		'favicon' => 'gwar.gif',
		'url' => 'http://www.gwar.pl/DodajGwar.html?u={permalink}',
	),

	'Haohao' => array(
		'favicon' => 'haohao.png',
		'url' => 'http://www.haohaoreport.com/submit.php?url={permalink}&amp;title={title}',
	),

	'HealthRanker' => array(
		'favicon' => 'healthranker.gif',
		'url' => 'http://healthranker.com/submit.php?url={permalink}&amp;title={title}',
	),

	'Hemidemi' => array(
		'favicon' => 'hemidemi.png',
		'url' => 'http://www.hemidemi.com/user_bookmark/new?title={title}&amp;url={permalink}',
	),

	'IndiaGram' => array(
		'favicon' => 'indiagram.png',
		'url' => 'http://www.indiagram.com/mock/bookmarks/desitrain?action=add&amp;address={permalink}&amp;title={title}',
	),

	'IndianPad' => array(
		'favicon' => 'indianpad.png',
		'url' => 'http://www.indianpad.com/submit.php?url={permalink}',
	),

	'Internetmedia' => array(
		'favicon' => 'im.png',
		'url' => 'http://internetmedia.hu/submit.php?url={permalink}'
	),

	'kick.ie' => array(
		'favicon' => 'kickit.png',
		'url' => 'http://kick.ie/submit/?url={permalink}&amp;title={title}',
	),

	'Kirtsy' => array(
		'favicon' => 'kirtsy.gif',
		'url' => 'http://www.kirtsy.com/submit.php?url={permalink}&amp;title={title}',
	),

	'laaik.it' => array(
		'favicon' => 'laaikit.png',
		'url' => 'http://laaik.it/NewStoryCompact.aspx?uri={permalink}&amp;headline={title}&amp;cat=5e082fcc-8a3b-47e2-acec-fdf64ff19d12',
	),

	'LinkArena' => array(
		'favicon' => 'linkarena.gif',
		'url' => 'http://linkarena.com/bookmarks/addlink/?url={permalink}&amp;title={title}',
	),
	
	'LinkaGoGo' => array(
		'favicon' => 'linkagogo.png',
		'url' => 'http://www.linkagogo.com/go/AddNoPopup?url={permalink}&amp;title={title}',
	),

	'LinkedIn' => array(
		'favicon' => 'linkedin.png',
		'url' => 'http://www.linkedin.com/shareArticle?mini=true&amp;url={permalink}&amp;title={title}&amp;source={weblog_title}&amp;summary=EXCERPT',
	),

	'Linkter' => array(
		'favicon' => 'linkter.png',
		'url' => 'http://www.linkter.hu/index.php?action=suggest_link&amp;url={permalink}&amp;title={title}',
	),
	
	'Live' => array(
		'favicon' => 'live.png',
		'url' => 'https://favorites.live.com/quickadd.aspx?marklet=1&amp;url={permalink}&amp;title={title}',
	),

	'Ma.gnolia' => array(
		'favicon' => 'magnolia.png',
		'url' => 'http://ma.gnolia.com/bookmarklet/add?url={permalink}&amp;title={title}',
	),

	'Meneame' => array(
		'favicon' => 'meneame.gif',
		'url' => 'http://meneame.net/submit.php?url={permalink}',
	),
	
	'MisterWong' => array(
		'favicon' => 'misterwong.gif',
		'url' => 'http://www.mister-wong.com/addurl/?bm_url={permalink}&amp;bm_description={title}&amp;plugin=soc',
	),

	'MisterWong.DE' => array(
		'favicon' => 'misterwong.gif',
		'url' => 'http://www.mister-wong.de/addurl/?bm_url={permalink}&amp;bm_description={title}&amp;plugin=soc',
	),
	
	'Mixx' => array(
		'favicon' => 'mixx.png',
		'url' => 'http://www.mixx.com/submit?page_url={permalink}&amp;title={title}',
	),
	
	'muti' => array(
		'favicon' => 'muti.png',
		'url' => 'http://www.muti.co.za/submit?url={permalink}&amp;title={title}',
	),
	
	'MyShare' => array(
		'favicon' => 'myshare.png',
		'url' => 'http://myshare.url.com.tw/index.php?func=newurl&amp;url={permalink}&amp;desc={title}',
	),

	'MySpace' => array(
		'favicon' => 'myspace.gif',
		'url' => 'http://www.myspace.com/Modules/PostTo/Pages/?l=3&amp;u={permalink}&amp;t={title}&amp;c=',
	),

	'N4G' => array(
		'favicon' => 'n4g.gif',
		'url' => 'http://www.n4g.com/tips.aspx?url={permalink}&amp;title={title}',
	),
	
	'Netscape' => array(
		'favicon' => 'netscape.gif',
		'url' => 'http://www.netscape.com/submit/?U={permalink}&amp;T={title}',
	),

	'NewsTrust' => array(
		'favicon' => 'newstrust.png',
		'url' => 'http://newstrust.net/submit?url={permalink}&title={title}',
	),

	'NewsVine' => array(
		'favicon' => 'newsvine.png',
		'url' => 'http://www.newsvine.com/_tools/seed&amp;save?u={permalink}&amp;h={title}',
	),

	'Netvouz' => array(
		'favicon' => 'netvouz.png',
		'url' => 'http://www.netvouz.com/action/submitBookmark?url={permalink}&amp;title={title}&amp;popup=no',
	),

	'NuJIJ' => array(
		'favicon' => 'nujij.gif',
		'url' => 'http://nujij.nl/jij.lynkx?t={title}&amp;u={permalink}',
	),

	'PlugIM' => array(
		'favicon' => 'plugim.png',
		'url' => 'http://www.plugim.com/submit?url={permalink}&amp;title={title}',
	),

	'PopCurrent' => array(
		'favicon' => 'popcurrent.png',
		'url' => 'http://popcurrent.com/submit?url={permalink}&amp;title={title}&amp;rss=RSS',
		'description' => 'description',
	),

	'Pownce' => array(
		'favicon' => 'pownce.gif',
		'url' => 'http://pownce.com/send/link/?url={permalink}&amp;note_body={title}&amp;note_to=all'
	),

	'ppnow' => array(
		'favicon' => 'ppnow.png',
		'url' => 'http://www.ppnow.net/submit.php?url={permalink}',
	),
	
	'Print' => array(
		'favicon' => 'printer.png',
		'url' => 'javascript:window.print();',
		'description' => 'Print this article!',
	),
	
	'Propeller' => array(
		'favicon' => 'propeller.gif',
		'url' => 'http://www.propeller.com/submit/?U={permalink}&amp;T={title}',
	),

	'Ratimarks' => array(
		'favicon' => 'ratimarks.png',
		'url' => 'http://ratimarks.org/bookmarks.php/?action=add&amp;address={permalink}&amp;title={title}',
	),

	'RawSugar' => array(
		'favicon' => 'rawsugar.png',
		'url' => 'http://www.rawsugar.com/tagger/?turl={permalink}&amp;tttl={title}',
	),

	'Rec6' => array(
		'favicon' => 'rec6.gif',
		'url' => 'http://www.syxt.com.br/rec6/link.php?url={permalink}&amp;={title}',
	),

	'Reddit' => array(
		'favicon' => 'reddit.png',
		'url' => 'http://reddit.com/submit?url={permalink}&amp;title={title}',
	),

	'SalesMarks' => array(
		'favicon' => 'salesmarks.gif',
		'url' => 'http://salesmarks.com/submit?edit[url]={permalink}&amp;edit[title]={title}',
	),
	
	'Scoopeo' => array(
		'favicon' => 'scoopeo.png',
		'url' => 'http://www.scoopeo.com/scoop/new?newurl={permalink}&amp;title={title}',
	),	

	'scuttle' => array(
		'favicon' => 'scuttle.png',
		'url' => 'http://www.scuttle.org/bookmarks.php/maxpower?action=add&amp;address={permalink}&amp;title={title}',
		'description' => 'description',
	),

	'Segnalo' => array(
		'favicon' => 'segnalo.gif',
		'url' => 'http://segnalo.alice.it/post.html.php?url={permalink}&amp;title={title}',
	),

	'Shadows' => array(
		'favicon' => 'shadows.png',
		'url' => 'http://www.shadows.com/features/tcr.htm?url={permalink}&amp;title={title}',
	),

	'Simpy' => array(
		'favicon' => 'simpy.gif',
		'url' => 'http://www.simpy.com/simpy/LinkAdd.do?href={permalink}&amp;title={title}',
	),

	'Shoutwire' => array(
		'favicon' => 'shoutwire.gif',
		'url' => 'http://www.shoutwire.com/?p=submit&amp;&amp;link={permalink}',
	),

	'Slashdot' => array(
		'favicon' => 'slashdot.png',
		'url' => 'http://slashdot.org/bookmark.pl?title={title}&amp;url={permalink}',
	),

	'Smarking' => array(
		'favicon' => 'smarking.png',
		'url' => 'http://smarking.com/editbookmark/?url={permalink}&amp;title={title}',
	),

	'Socialogs' => array(
		'favicon' => 'socialogs.gif',
		'url' => 'http://socialogs.com/add_story.php?story_url={permalink}&amp;story_title={title}',
	),
	
	'Spurl' => array(
		'favicon' => 'spurl.png',
		'url' => 'http://www.spurl.net/spurl.php?url={permalink}&amp;title={title}',
	),

	'SphereIt' => array(
		'favicon' => 'sphere.png',
		'url' => 'http://www.sphere.com/search?q=sphereit:{permalink}&amp;title={title}',
	),

	'Sphinn' => array(
		'favicon' => 'sphinn.png',
		'url' => 'http://sphinn.com/submit.php?url={permalink}&amp;title={title}',
	),

	'Squidoo' => array(
		'favicon' => 'squidoo.gif',
		'url' => ' http://www.squidoo.com/lensmaster/bookmark?{permalink}',
	),

	'StumbleUpon' => array(
		'favicon' => 'stumbleupon.png',
		'url' => 'http://www.stumbleupon.com/submit?url={permalink}&amp;title={title}',
	),

	'Taggly' => array(
		'favicon' => 'taggly.png',
		'url' => 'http://taggly.com/bookmarks.php/pass?action=add&amp;address=',
	),

	'Technorati' => array(
		'favicon' => 'technorati.png',
		'url' => 'http://technorati.com/faves?add={permalink}',
	),

	'TailRank' => array(
		'favicon' => 'tailrank.png',
		'url' => 'http://tailrank.com/share/?text=&amp;link_href={permalink}&amp;title={title}',
	),

	'ThisNext' => array(
		'favicon' => 'thisnext.png',
		'url' => 'http://www.thisnext.com/pick/new/submit/sociable/?url={permalink}&amp;name={title}',
	),

	'TwitThis' => array(
		'favicon' => 'twitter.png',
		'url' => 'http://twitthis.com/twit?url={permalink}',
	),

	'Upnews' => array(
			'favicon' => 'upnews.gif',
			'url' => 'http://www.upnews.it/submit?url={permalink}&amp;title={title}',
	),
	
	'Webnews.de' => array(
        'favicon' => 'webnews.gif',
        'url' => 'http://www.webnews.de/einstellen?url={permalink}&amp;title={title}',
    ),

	'Webride' => array(
		'favicon' => 'webride.png',
		'url' => 'http://webride.org/discuss/split.php?uri={permalink}&amp;title={title}',
	),

	'Wikio' => array(
		'favicon' => 'wikio.gif',
		'url' => 'http://www.wikio.com/vote?url={permalink}',
	),

	'Wikio FR' => array(
		'favicon' => 'wikio.gif',
		'url' => 'http://www.wikio.fr/vote?url={permalink}',
	),

	'Wikio IT' => array(
		'favicon' => 'wikio.gif',
		'url' => 'http://www.wikio.it/vote?url={permalink}',
	),
	
	/*
	'Wists' => array(
		'favicon' => 'wists.png',
		'url' => 'http://wists.com/s.php?c=&amp;r={permalink}&amp;title={title}',
		'class' => 'wists',
	),
	*/

	'Wykop' => array(
		'favicon' => 'wykop.gif',
		'url' => 'http://www.wykop.pl/dodaj?url={permalink}',
	),

	'Xerpi' => array(
		'favicon' => 'xerpi.gif',
		'url' => 'http://www.xerpi.com/block/add_link_from_extension?url={permalink}&amp;title={title}',
	),

	'YahooBuzz' => array(
		'favicon' => 'yahoobuzz.png',
		'url' => 'http://buzz.yahoo.com/article/file/{permalink}',
	),

	'YahooMyWeb' => array(
		'favicon' => 'yahoomyweb.png',
		'url' => 'http://myweb2.search.yahoo.com/myresults/bookmarklet?u={permalink}&amp;={title}',
	),

	'Yigg' => array(
		'favicon' => 'yiggit.png',
		'url' => 'http://yigg.de/neu?exturl={permalink}&amp;exttitle={title}',
	 )

);

?>