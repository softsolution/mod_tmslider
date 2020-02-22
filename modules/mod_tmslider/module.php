<?php
/* soft-solution.ru created by AlexG */

function mod_tmslider($module_id){

	$inCore = cmsCore::getInstance();
	$inDB = cmsDatabase::getInstance();
	
	$cfg = $inCore->loadModuleConfig($module_id);
	
	$default_cfg = array (	
		'shownum'=>'5', 
		'album_id'=>'0', 
		'bannereffect'=>'fromRight', 
		'width'=>'565', 
		'height'=>'290', 
		'duration'=>'10000', 
		'slideshow'=>'7000', 
		'shownav'=>'1', 
		'pauseOnHover'=>'0'
	);
	
	$cfg = array_merge($default_cfg, $cfg);

	$catsql = '';

	if ($cfg['album_id'] != 0) {
            $rootcat = $inDB->get_fields('cms_photo_albums', "id='{$cfg['album_id']}'", 'NSLeft, NSRight');
			if(!$rootcat) { return false; }
            $catsql = " AND a.NSLeft >= {$rootcat['NSLeft']} AND a.NSRight <= {$rootcat['NSRight']}";
        }

	if (!isset($cfg['showtype'])) { $cfg['showtype'] = 'full'; }
	if (!isset($cfg['showmore'])) { $cfg['showmore'] = 1; }


        $sql = "SELECT f.*, a.id as album_id, a.title as album
                        FROM cms_photo_files f
                        LEFT JOIN cms_photo_albums a ON a.id = f.album_id
                        WHERE f.published = 1 ".$catsql."
                        ORDER BY f.id DESC
                        LIMIT ".$cfg['shownum'];

        $result = $inDB->query($sql);


        if ($inDB->num_rows($result)) {
            $photos = array();

            while ($con = $inDB->fetch_assoc($result)) {
                $photos[] = $con;
            }
			
        } else {
			return false;
		}

        $smarty = $inCore->initSmarty('modules', 'mod_tmslider.tpl');
        $smarty->assign('photos', $photos);
        $smarty->assign('cfg', $cfg);
        $smarty->display('mod_tmslider.tpl');

        return true;

}
?>