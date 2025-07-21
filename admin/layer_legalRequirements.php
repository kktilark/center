<!-- //gnbAnchor_wrap -->
<div id="legal_requirements"
     class="ly_setting <?= ($indexFl == 'y') ? '' : 'sub_type' ?>" <?= ($legalRequirementsData['config']['displayFl'] == 'true') ? '' : 'style="display:none;"' ?>>
    <div class="setting_header">
        <h4>따라하면 완성되는 쇼핑몰</h4>
        <p>
            <?php if(Session::get('manager.isSuper') == 'y') { ?>
                어디부터 시작해야 할지 막막하다면 체크하면서 따라해 보세요
            <?php } else { ?>
                설정항목체크는 최고운영자만 할 수 있습니다.
            <?php } ?>
        </p>
        <label for="check1" class="check_label">
            <div class="input_check_box">
                <input type="checkbox" name="" value="" id="check1" class="check-origin" <?=($legalRequirementsData['config']['checkedFl'] == 'true') ?'checked=checked' : ''?>>
                <span class="check-clone"></span>
            </div>
            <span class="label_txt">완료 항목  <?=($legalRequirementsData['config']['checkedFl'] == 'true') ?'노출' : '숨김'?></span>
        </label>
        <div class="checked_count_txt"><span id="checked_txt">0</span>/<span id="checkbox_txt">0</span>개 완료</div>
        <ul class="tab_list">
            <li class="active"><a href="#start">시작</a></li>
            <li><a href="#selling">판매 준비</a></li>
            <li><a href="#promotion">홍보 준비</a></li>
            <li><a href="#security">보안 강화</a></li>
        </ul>
        <span class="btn_close"><img src="../admin/gd_share/img/icon_ly_close.png" alt="닫기 버튼"/></span>
    </div>
    <!-- //setting_header -->
    <div class="inner">
        <div class="cont_wrap">
            <div id="start" class="setting_cont">
                <h5>시작</h5>
                <div class="setting_box">
                    <!--N:체크 항목 리스트 노출-->
                    <ul class="setting_list">
                        <?php foreach($legalRequirementsData['list']['start'] as $key => $val) { ?>
                            <li>
                                <div class="input_area">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="start" value="<?=$key?>" <?=($legalRequirementsData['data']['start'][$key] == 'true') ?'checked=checked' : ''?> >
                                        <span></span>
                                    </label>
                                </div>
                                <div class="text_area">
                                    <a href="<?=$val['url']?>" target="_blank">
                                        <span class="txt">
                                            <strong><?=$val['title']?></strong>
                                            <span class="s_txt"><?=$val['desc']?></span>
                                        </span>
                                    </a>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                    <!--//N-->

                    <!--N:모든 항목 숨김 처리시 노출-->
                    <p class="empty_notice" style="display:none;">모든 항목의 설정이 완료 되었습니다.</p>
                    <!--//N-->
                </div>
                <!-- //setting_box -->
            </div>
            <!-- //setting_cont -->

            <div id="selling" class="setting_cont">
                <h5>판매 준비</h5>
                <div class="setting_box">
                    <!--N:체크 항목 리스트 노출-->
                    <ul class="setting_list">
                        <?php foreach($legalRequirementsData['list']['selling'] as $key => $val) { ?>
                            <li>
                                <div class="input_area">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="selling" value="<?=$key?>" <?=($legalRequirementsData['data']['selling'][$key] == 'true') ?'checked=checked' : ''?> >
                                        <span></span>
                                    </label>
                                </div>
                                <div class="text_area">
                                    <a href="<?=$val['url']?>" target="_blank">
                                        <span class="txt">
                                            <strong><?=$val['title']?></strong>
                                            <span class="s_txt"><?=$val['desc']?></span>
                                        </span>
                                    </a>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                    <!--//N-->

                    <!--N:모든 항목 숨김 처리시 노출-->
                    <p class="empty_notice" style="display:none;">모든 항목의 설정이 완료 되었습니다.</p>
                    <!--//N-->
                </div>
                <!-- //setting_box -->
            </div>
            <!-- //setting_cont -->

            <div id="promotion" class="setting_cont">
                <h5>홍보 준비</h5>
                <div class="setting_box">
                    <!--N:체크 항목 리스트 노출-->
                    <ul class="setting_list">
                        <?php foreach($legalRequirementsData['list']['promotion'] as $key => $val) { ?>
                            <li>
                                <div class="input_area">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="promotion" value="<?=$key?>" <?=($legalRequirementsData['data']['promotion'][$key] == 'true') ?'checked=checked' : ''?> >
                                        <span></span>
                                    </label>
                                </div>
                                <div class="text_area">
                                    <a href="<?=$val['url']?>" target="_blank">
                                        <span class="txt">
                                            <strong><?=$val['title']?></strong>
                                            <span class="s_txt"><?=$val['desc']?></span>
                                        </span>
                                    </a>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                    <!--//N-->

                    <!--N:모든 항목 숨김 처리시 노출-->
                    <p class="empty_notice" style="display:none;">모든 항목의 설정이 완료 되었습니다.</p>
                    <!--//N-->
                </div>
                <!-- //setting_box -->
            </div>
            <!-- //setting_cont -->

            <div id="security" class="setting_cont">
                <h5>보안 강화</h5>
                <div class="setting_box">
                    <!--N:체크 항목 리스트 노출-->
                    <ul class="setting_list">
                        <?php foreach($legalRequirementsData['list']['security'] as $key => $val) { ?>
                            <li>
                                <div class="input_area">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="security" value="<?=$key?>" <?=($legalRequirementsData['data']['security'][$key] == 'true') ?'checked=checked' : ''?> >
                                        <span></span>
                                    </label>
                                </div>
                                <div class="text_area">
                                    <a href="<?=$val['url']?>" target="_blank">
                                        <span class="txt">
                                            <strong><?=$val['title']?></strong>
                                            <span class="s_txt"><?=$val['desc']?></span>
                                        </span>
                                    </a>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                    <!--//N-->

                    <!--N:모든 항목 숨김 처리시 노출-->
                    <p class="empty_notice" style="display:none;">모든 항목의 설정이 완료 되었습니다.</p>
                    <!--//N-->
                </div>
                <!-- //setting_box -->
            </div>
            <!-- //setting_cont -->

            <div id="more_info">
                <div class="notice-info"> 고도몰 교육이 필요하다면? <a href="https://www.nhn-commerce.com/main/class" target="_blank">클래스 신청하기 ></a></div>
                <div class="notice-info"> 더 많은 정보가 필요하다면? <a href="https://godomall-help.nhn-commerce.com/" target="_blank">도움말 자세히 보기 ></a></div>
            </div>
        </div>
    </div>
</div>
<script>

    $(function(){
        var header_h = $('#header').outerHeight();
        var location_h = $('#header .breadcrumb').outerHeight();
        var pageheader_h = $('.page-header').outerHeight();
        var sub_h = header_h + location_h + 76;
        const expireDay = 7;

        $(window).resize(resizeContents);
        resizeContents();

        // 체크된 항목 계산
        var checkboxList = $('.ly_setting .cont_wrap input[type="checkbox"]');
        $("#checked_txt").text(checkboxList.filter(':checked').length);
        $("#checkbox_txt").text(checkboxList.length);

        function resizeContents() {
            if($('.ly_setting').hasClass('sub_type')){
                if($('.ly_setting').hasClass('on')){
                    var ly_sub_h3 = ($(window).height())-pageheader_h;
                    $(".ly_setting").css({'height':ly_sub_h3});
                }else{
                    var ly_sub_h2 = ($(window).height())-sub_h;
                    $(".ly_setting").css({'height':ly_sub_h2});
                }
            }else{
                if($('.ly_setting').hasClass('on')){
                    $(".ly_setting").css('height','100%');
                }else{
                    var ly_h = ($(window).height())-header_h;
                    $(".ly_setting").css('height', ly_h);
                }
            }
        }

        if($('.ly_setting').hasClass('sub_type')){
            $(".sub_type").css('top', sub_h);
        }else{
            $(".ly_setting").css('top', header_h);
        }

        $(window).scroll(function() {
            var position = $(window).scrollTop();
            if($('.ly_setting').hasClass('sub_type')){
                var ly_sub_h = ($(window).height())-59;
                if(position >= 130) {
                    $(".ly_setting").addClass('on');
                    $(".ly_setting").addClass('active');
                    $(".ly_setting").css({'height':ly_sub_h,'top':59});
                }else{
                    $(".ly_setting").removeClass('on');
                    $(".ly_setting").removeClass('active');
                    resizeContents();
                    $(".sub_type").css('top', sub_h);

                    if(1 <= position <= 129){
                        $(".ly_setting").css({'height':ly_sub_h});
                        $(".sub_type").css('top', sub_h-position);
                    }else{
                        var ly_sub_h2 = ($(window).height())-sub_h;
                        $(".ly_setting").css({'height':ly_sub_h2});
                    }
                }
            }else{
                if(position >= 1) {
                    $(".ly_setting").addClass('on');
                    $(".ly_setting").css({'height':'100%','top':'0px'});
                } else {
                    $(".ly_setting").removeClass('on');
                    resizeContents();
                    $(".ly_setting").css('top', header_h);
                }
            }


        });

        //setting_button
        $('.btn_setting').on('click',function(){
            $('.ly_setting').show();
            $.cookie('legalRequirements_displayFl', 'true', {expires: expireDay, path: '/'});
            listSort();
        });
        function listSort() {
            var checked = $( ".setting_header .input_check_box input[type=checkbox]" ).is(':checked');
            $('.cont_wrap li').each(function(){
                var parentsId = $(this).parents('div.setting_cont').attr('id');
                if($(this).find('input[type=checkbox]').is(':checked') == true) {
                    var li = $(this).clone();
                    $('#'+parentsId+' ul').append(li);
                    if(checked) $(li).attr('style', "display:none;");
                    $(this).remove();
                }
            }).promise().done(function(){
                if(checked) displayChecked();
                if ($.cookie('legalRequirements_displayFl') === 'true') {
                    const tab = getCurrentVisibleTab();
                    $(`a[href="${tab}"]`).get(0).click();
                }
            });
        }

        function getCurrentVisibleTab() {
            const sections = ['#start', '#selling', '#promotion', '#security'];

            for (const section of sections) {
                const total = $(`${section} li`).length;
                const checked = $(`${section} li input[type=checkbox]:checked`).length;

                // 현재 섹션이 완료되지 않았다면 해당 섹션 반환
                if (total !== checked) {
                    return section;
                }
            }

            // 모든 섹션이 완료되었다면 마지막 섹션 반환
            return sections[sections.length - 1];
        }

        //close_button
        $('.btn_close').on('click',function(){
            $('.ly_setting').hide();
            $.cookie('legalRequirements_displayFl', 'false', {expires: expireDay, path: '/'});
        });

        // checkbox checked
        $(document).on('click', '.ly_setting .cont_wrap input[type="checkbox"]', function(event){
            <?php if(Session::get('manager.isSuper') == 'y') { ?>
            var name = $(this).attr('name');
            var key = $(this).val();
            var checked = $(this).is(':checked');
            var data = {
                'mode': 'saveLegalRequirements',
                'name': name,
                'key': key,
                'val': checked
            }

            // 체크된 항목 계산
            var checked_list = $('.ly_setting .cont_wrap input[type="checkbox"]:checked');
            $("#checked_txt").text(checked_list.length);

            $.ajax('/base/layer_legal_requirements_ps.php', {type: "post", data: data});

            <?php } else { ?>
            event.preventDefault();
            <?php } ?>
        })

        //check_hidden
        function displayChecked() {
            var checked = $( ".setting_header .input_check_box input[type=checkbox]" ).is(':checked');
            if(checked == true) {
                $('.ly_setting .cont_wrap input[type="checkbox"]:checked').parents('li').hide();
                if($("input[name=start]").length == $("input[name=start]:checked").length) $('#start .empty_notice').show();
                if($("input[name=selling]").length == $("input[name=selling]:checked").length) $('#selling .empty_notice').show();
                if($("input[name=promotion]").length == $("input[name=promotion]:checked").length) $('#promotion .empty_notice').show();
                if($("input[name=security]").length == $("input[name=security]:checked").length) $('#security .empty_notice').show();
                $(".setting_header .label_txt").text(" 완료 항목 노출");

            } else {
                $('ul.setting_list li').show();
                $('.ly_setting .empty_notice').hide();
                $(".setting_header .label_txt").text(" 완료 항목 숨김");
            }
        };

        $(".setting_header .input_check_box input[type=checkbox]").on("click", function() {
            displayChecked();
            var checked = $( ".setting_header .input_check_box input[type=checkbox]" ).is(':checked');
            $.cookie('legalRequirements_checkedFl', checked, {expires: expireDay, path: '/'});
        });
        listSort();
    });

    // 메뉴 스크롤 이벤트
    const scrollContainer = document.querySelector('#legal_requirements .cont_wrap');
    const tabs = document.querySelectorAll('#legal_requirements ul.tab_list a');
    const sections = document.querySelectorAll('#legal_requirements .setting_cont');

    // 스크롤 감지 함수
    function updateActiveLink() {
        const scrollBottom = scrollContainer.scrollHeight - scrollContainer.scrollTop - scrollContainer.clientHeight;

        sections.forEach((section, index) => {
            const sectionTop = section.offsetTop - scrollContainer.scrollTop;
            const sectionHeight = section.offsetHeight;

            // 섹션이 div 내부 상단에 도달했을 때
            if (sectionTop <= 300 && sectionTop >= -sectionHeight + 300) {
                tabs.forEach(tab => tab.style.backgroundColor = '');
                tabs[index].style.backgroundColor = 'red';
            }
        });

        if (scrollBottom === 0) {
            tabs.forEach(link => link.style.backgroundColor = '');
            tabs[tabs.length - 1].style.backgroundColor = 'red'; // 마지막 링크를 활성화
        }
    }

    window.addEventListener('DOMContentLoaded', function () {
        tabs[0].style.backgroundColor = 'red'; // 최초 진입시 '시작' 디폴트 노출
    });

    scrollContainer.addEventListener('scroll', updateActiveLink);
</script>
<!-- //pub_190802 -->

<?php if($indexFl == 'y') { ?>
    <div class="gnbAnchor_wrap">
        <span class="btn_setting"><img src="../admin/gd_share/img/icon_setting_guide.svg" alt="따라하기 버튼"/></span>
    </div>
<?php } ?>
