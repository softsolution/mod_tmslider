{* Слайдер галлерея tmslider *}

<link rel="stylesheet" type="text/css" href="/modules/mod_tmslider/css/tmslider.css" />
{*<script type="text/javascript" src="/modules/mod_tmslider/js/jquery.easing.1.3.js"></script>*}
<script type="text/javascript" src="/modules/mod_tmslider/js/tms-0.4.1.js"></script>

<div class="tmslider-box">
    <div class="slider">
        <ul class="items">
        {foreach key=tid item=con from=$photos}
            <li><img src="/images/photos/medium/{$con.file}" alt="{$con.title|escape:'html'}" width="{$cfg.width}" height="{$cfg.height}"><div class="banner"><span>{if $con.description}{$con.description|escape:'html'}{else}{$con.title|escape:'html'}{/if}</span></div></li>
        {/foreach}
        </ul>
    </div>
    <a href="#" class="tmprev">&lt;</a> <a href="#" class="tmplay"><em>стоп</em><span>старт</span></a> <a href="#" class="tmnext">&gt;</a>
</div>

{literal}
<script>
$(document).ready(function(){
    $('.slider')._TMS({
        show:0,
        pauseOnHover:{/literal}{if $cfg.pauseOnHover}true{else}false{/if}{literal},
        prevBu:'.tmprev',
        nextBu:'.tmnext',
        playBu:'.tmplay',
        duration:{/literal}{if $cfg.duration}{$cfg.duration}{else}10000{/if}{literal},
        preset:'zoomer',
        pagination:{/literal}{if $cfg.shownav}true{else}false{/if}{literal},
        pagNums:false,
        slideshow:7000,
        numStatus:true,
        banners:{/literal}{if $cfg.bannereffect}'{$cfg.bannereffect}'{else}'fromRight'{/if}{literal},
        waitBannerAnimation:false,
        progressBar:'<div class="progbar"></div>'
    });	
});
</script>
{/literal}
{literal}
<style>
.tmslider-box{
    {/literal}
    height:{$cfg.height}px;
    width:{$cfg.width}px;
    {literal}
}
.slider { width:{/literal}{$cfg.width}px;{literal} }
</style>
{/literal}