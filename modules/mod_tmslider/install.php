<?php
	function info_module_mod_tmslider(){

        $_module['title']         = 'Cлайдер-галлерея TMSlider';
        $_module['name']          = 'Cлайдер-галлерея TMSlider';
        $_module['description']   = 'Cлайдер-галлерея TMSlider';
        $_module['link']          = 'mod_tmslider';
        $_module['position']      = 'maintop';
        $_module['author']        = '<a href="http://soft-solution.ru" target="_blank">soft-solution.ru</a>';
        $_module['version']       = '1.0';

        $_module['config'] = array (	
			'shownum'=>'5', 
			'album_id'=>'0', 
			'bannereffect'=>'fromRight', 
			'width'=>'900', 
			'height'=>'600', 
			'duration'=>'10000', 
			'slideshow'=>'7000', 
			'shownav'=>'1', 
			'pauseOnHover'=>'0'
		);

        return $_module;

    }

    function install_module_mod_tmslider(){

        return true;

    }

    function upgrade_module_mod_tmslider(){

        return true;

    }

?>