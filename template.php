<?

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

pre('stat default v3');

if (method_exists($this, 'createFrame')) 
{
    $frame = $this->createFrame()->begin();
}


//pre($arResult['RESPONSES']);

// // alertify
// \Bitrix\Main\Page\Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/alertify.core.css');
// \Bitrix\Main\Page\Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/alertify.default.css');
// \Bitrix\Main\Page\Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/alertify.min.js');

\Bitrix\Main\Page\Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/styles/stat.css');

// restyling
\Bitrix\Main\Page\Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/styles/mystyle3.css');

$authorized = $USER->IsAuthorized();

?>
<div class="ContWrap Cont1120">
    <? if ($authorized): ?>
    <?
            $APPLICATION->IncludeComponent(
                'democontent2.pi:user.sidebar',
                ''
            );
        ?>
    <? else: ?>
    <div class="SideBar">
        <div class="LogoLeft hide"><a href="/"><img src="<?= SITE_TEMPLATE_PATH?>/images/logo.png" alt=""></a></div>
    </div>
    <? endif ?>
    <div class="Content">
        <div class="HDmain_stat">Статистика</div>
      <form>
           <div class="HDmain_stat--input">
				<div class="date-style">
                    <div class="elem_input">
                      <div class="Field Field_stat td_border">
                        <p>От</p>
                        <input type="date" name="date_begin" value="<?= $arResult['date_begin'] ?>">
                      </div>
                      <div class="Field Field_stat">
                        <p>До</p>
                        <input type="date" name="date_end" value="<?= $arResult['date_end'] ?>">
                      </div>
                    </div>
                </div>
            </div>
        <div class="stat-wrap">

                <div class="stat-res">
                    <div class="title-general">
                        <p>№ Задания</p>
                        <p  class="title-general--center">Статус</p>
                        <p>Кол-во</p>
                    </div>
	 						<!--  Новых регистраций-->
 						 <p class="td_border1">Новых регистраций</p>

					  <div class="title-general--border4" style="grid-area: vstavkab_row;justify-content: flex-end;">
						<p>Кол-во</p>
					  </div>
                    <div class="td_border--massiv td_border1--vstavkab">
                        <div class="line">
                            <div class="td_border--flex">
                                <!--Задание-->
                             </div>
							<div class="td_border--flex">                               
								</div>                             
							<div class="td_border--flex">
                                <!--Кол-во-->
                                <? if ($arResult['TOTAL_REGS']>0): ?>
                                    <span class="border_num"><a href="/users/?show=newregs&d1=<?= $arResult['date_begin'] ?>&d2=<?= $arResult['date_end'] ?>"><?= $arResult['TOTAL_REGS'] ?></a></span>
                                <? else: ?>    
                                    <span class="border_num"><?= $arResult['TOTAL_REGS'] ?></span>
                                <? endif ?>
                            </div>
                        </div>
                    </div>
			 				<!--  Новых задач-->
 						 <p class="td_border2">Новых задач</p>

					  <div class="title-general--border4" style="grid-area: vstavkac_row;">
						<p>№ Задания</p>
						<p class="title-general--center2">Статус</p>
						<p>Кол-во</p>
					  </div>
                    <div class="td_border--massiv td_border2--vstavkac">
                        <div class="line">
                            <div class="td_border--flex">
                                <!--Задание-->
								<? foreach($arResult['NEW_TASKS'] as $item): ?>
                                  <a class="link_num" href="/<?= $item['UF_IBLOCK_TYPE'].'/'.$item['UF_IBLOCK_CODE'].'/'.$item['UF_CODE'] ?>/"><span><?= $item['UF_ITEM_ID'] ?></span></a>
                                <? endforeach ?>
                            </div>
                            <div class="td_border--flex">
                                <!--Статусы-->

                                <? foreach($arResult['NEW_TASKS'] as $item): ?>
                                    <p class="border_status">
                                        <span class="stat_green">Открыто</span>
                                    </p>
                                <? endforeach ?>
                            </div> 
                            <div class="td_border--flex">
                                <!--Кол-во-->
                                 <span class="border_num"><?= $arResult['TOTAL_NEW_TASKS'] ?></span>
                            </div>
                        </div>
                    </div>
						 <!--  Активных задач-->
 						 <p class="td_border3">Активных задач</p>

					  <div class="title-general--border4" style="grid-area: vstavkad_row;">
						<p>№ Задания</p>
						<p class="title-general--center2">Статус</p>
						<p>Кол-во</p>
					  </div>
                    <div class="td_border--massiv td_border3--vstavkad">
                        <div class="line">
                            <div class="td_border--flex">
                                <!--Задание-->
								<? foreach($arResult['WORK_TASKS'] as $item): ?>
                                  <a class="link_num" href="/<?= $item['UF_IBLOCK_TYPE'].'/'.$item['UF_IBLOCK_CODE'].'/'.$item['UF_CODE'] ?>/"><span><?= $item['UF_ITEM_ID'] ?></span></a>
                                <? endforeach ?>
                            </div>
                            <div class="td_border--flex">
                                <!--Статусы-->

                                <? foreach($arResult['WORK_TASKS'] as $item): ?>
                                    <p class="border_status">
                                        <span class="stat_orange">В работе</span>
                                    </p>
                                <? endforeach ?>
                            </div> 
                            <div class="td_border--flex">
                                <!--Кол-во-->
                                 <span class="border_num"><?= $arResult['TOTAL_WORK_TASKS'] ?></span>
                            </div>
                        </div>
                    </div>
						<!--Отклики-->
                    <p class="td_border4">Кол-во откликов</p>

					  <div class="title-general--border4" style="grid-area: vstavkae_row;">
						<p>№ Задания</p>
						<p class="title-general--center2">Статус</p>
						<p>Кол-во</p>
					  </div>
                    <div class="td_border--massiv td_border4--vstavkae">
                        <div class="line">
                            <div class="td_border--flex">
                                <!--Задание-->
                                <? foreach($arResult['RESPONSES'][1]['items'] as $item): ?>
                                    <a class="link_num" href="/<?= $item['UF_IBLOCK_TYPE'].'/'.$item['UF_IBLOCK_CODE'].'/'.$item['UF_CODE'] ?>/"><span><?= $item['UF_ITEM_ID'] ?></span></a>
                                <? endforeach ?>
                                <? foreach($arResult['RESPONSES'][2]['items'] as $item): ?>
                                    <a class="link_num" href="/<?= $item['UF_IBLOCK_TYPE'].'/'.$item['UF_IBLOCK_CODE'].'/'.$item['UF_CODE'] ?>/"><span><?= $item['UF_ITEM_ID'] ?></span></a>
                                <? endforeach ?>

                            </div>
                            <div class="td_border--flex">
                                <!--Статусы-->
                                <? foreach($arResult['RESPONSES'][1]['items'] as $item): ?>
                                    <p class="border_status">
                                        <span class="stat_green">Открыто</span>
                                    </p>
                                <? endforeach ?>

                                <? foreach($arResult['RESPONSES'][2]['items'] as $item): ?>
                                    <p class="border_status">
                                        <span class="stat_orange">В работе</span>
                                    </p>
                                <? endforeach ?>

                            </div>
                            
                            <div class="td_border--flex">
                                <!--Кол-во-->
                                <? foreach($arResult['RESPONSES'][1]['items'] as $item): ?>
                                    <span class="border_num"><?= $item['RESP_CNT'] ?></span>
                                <? endforeach ?>

                                <? foreach($arResult['RESPONSES'][2]['items'] as $item): ?>
                                    <span class="border_num"><?= $item['RESP_CNT'] ?></span>
                                <? endforeach ?>

                            </div>
                        </div>
                    </div>
			 				<!-- Завершенных задач-->
 						 <p class="td_border5">Завершенных задач</p>

					  <div class="title-general--border4" style="grid-area: vstavkah_row;">
						<p>№ Задания</p>
						<p class="title-general--center2">Статус</p>
						<p>Кол-во</p>
					  </div>
                    <div class="td_border--massiv td_border5--vstavkah">
                        <div class="line">
                            <div class="td_border--flex">
                                <!--Задание-->
								<? foreach($arResult['CLOSED_TASKS'] as $item): ?>
                                  <a class="link_num" href="/<?= $item['UF_IBLOCK_TYPE'].'/'.$item['UF_IBLOCK_CODE'].'/'.$item['UF_CODE'] ?>/"><span><?= $item['UF_ITEM_ID'] ?></span></a>
                                <? endforeach ?>
                            </div>
                            <div class="td_border--flex">
                                <!--Статусы-->
                                <? foreach($arResult['CLOSED_TASKS'] as $item): ?>
                                    <p class="border_status">
                                      <span class="stat_red">Завершено</span>
                                    </p>
                                <? endforeach ?>
                            </div> 
                            <div class="td_border--flex">
                                <!--Кол-во-->
                                 <span class="border_num"><?= $arResult['TOTAL_CLOSED_TASKS'] ?></span>
                            </div>
                        </div>
                    </div>
		<!--Всего пользователей-->
 						 <p class="td_border6">Всего пользователей</p>
                  
					  <div class="title-general--border4" style="grid-area: vstavkam_row;">
						<p></p>
						<p class="title-general--center2"></p>
						<p>Кол-во</p>
					  </div>
                    <div class="td_border--massiv td_border6--vstavkam">
                        <div class="line">
                            <div class="td_border--flex">
                                <!--Задание-->

                            </div>
                            <div class="td_border--flex">
                                <!--Статусы-->

                            </div> 
                            <div class="td_border--flex">
                                <!--Кол-во-->
                                 <span class="border_num"><?= $arResult['TOTAL_USERS'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="stat_button">
                    <button type="button" id="btn_cln" class="stat_button--sbros">Сбросить</button>
                    <button type="submit" id="btn_run" class="stat_button--show">Показать</button>
                </div>
			  </div>
            </form>

    </div>
</div>
<?
    if (method_exists($this, 'createFrame')) 
    {
        $frame->end();
    }

?>