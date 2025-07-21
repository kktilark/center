<form id="frmBase" action="base_ps.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="mode" value="base_info"/>
    <input type="hidden" name="mallFaviconTmp" value="<?php echo $data['mallFavicon']; ?>"/>
    <input type="hidden" name="stampImageTmp" value="<?php echo $data['stampImage'];?>" />
    <input type="hidden" name="receiptImageTmp" value="<?php echo $data['receiptImage'];?>" />
    <input type="hidden" name="mallSno" value="<?php echo $mallSno;?>" />
    <input type="hidden" name="mallFl" value="<?php echo $mallFl;?>" />

    <div class="page-header js-affix">
        <h3><?php echo end($naviMenu->location); ?>
            <small>쇼핑몰의 기본적인 정보를 변경하실 수 있습니다.</small>
        </h3>
        <input type="submit" value="저장" class="btn btn-red"/>
    </div>

    <?php if ($mallCnt > 1) { ?>
        <ul class="multi-skin-nav nav nav-tabs" style="margin-bottom:20px;">
            <?php foreach ($mallList as $key => $mall) { ?>
                <li role="presentation" class="js-popover <?php echo $mallSno == $mall['sno'] ? 'active' : 'passive'; ?>" data-html="true" data-content="<?php echo $mall['mallName']; ?>" data-placement="top">
                    <a href="./base_info.php?mallSno=<?php echo $mall['sno']; ?>">
                        <span class="flag flag-16 flag-<?php echo $mall['domainFl']?>"></span>
                        <span class="mall-name"><?php echo $mall['mallName']; ?></span>
                    </a>
                </li>
            <?php } ?>
        </ul>
    <?php } ?>

    <div class="table-title gd-help-manual">
        쇼핑몰 기본 정보
    </div>
    <table class="table table-cols">
        <colgroup>
            <col class="width-md"/>
            <col class="width-xl"/>
            <col class="width-md"/>
            <col/>
        </colgroup>
        <tr>
            <th>쇼핑몰명</th>
            <td class="form-inline" <?php if ($mallSno > 1) { ?>colspan="3"<?php } ?>>
                <input type="text" name="mallNm" value="<?php echo $data['mallNm']; ?>" class="form-control width-lg"/>
            </td>
            <th class="<?php if ($mallSno > 1) { ?>display-none<?php } ?>">쇼핑몰영문명</th>
            <td class="form-inline <?php if ($mallSno > 1) { ?>display-none<?php } ?>">
                <input type="text" name="mallNmEng" value="<?php echo $data['mallNmEng']; ?>" <?php echo $readonly . $disabled; ?> class="form-control width-lg"/>
            </td>
        </tr>
        <tr>
            <th>상단타이틀</th>
            <td class="form-inline">
                <input type="text" name="mallTitle" value="<?php echo $data['mallTitle']; ?>" class="form-control width-lg"/>
            </td>
            <th>파비콘</th>
            <td class="form-inline">
                <input type="file" name="mallFavicon" <?php echo $disabled; ?> class="form-control"/>
                <span>
<?php
if (empty($data['mallFavicon']) === false) {
    echo gd_html_image(UserFilePath::data('common', $data['mallFavicon'])->www(), '파비콘');
    echo '<label class="checkbox-inline" style="padding-left:10px"><input type="checkbox" name="mallFaviconDel" ' . $disabled . ' value="y" />삭제</label>';
}
?>
				</span>
                <div class="notice-info">이미지사이즈 16x16 pixel, 파일형식 ico로 등록해야 합니다</div>
            </td>
        </tr>
        <tr>
            <th class="require">쇼핑몰 도메인</th>
            <td colspan="3" class="form-inline">
                <span class="font-eng">http://</span>
                <input type="text" name="mallDomain" value="<?php echo $data['mallDomain']; ?>" <?php echo $readonly . $disabled; ?> class="form-control width-2xl"/>
                <input type="button" value="도메인 신청하기" onclick="moveToExternalDomainUrl('intro');" class="btn btn-gray btn-sm">
                <?php if ($mallFl == 'kr'): ?>
                    <input type="button" value="도메인 연결/관리" onclick="moveToExternalDomainUrl('manage');" class="btn btn-gray btn-sm">
                <?php else: ?>
                    <input type="button" value="도메인 연결/관리" onclick="window.location.href='<?php echo $domainUrlList['manage']; ?>'" class="btn btn-gray btn-sm">
                <?php endif; ?>

                <div class="notice-info">
                    입력 시 쇼핑몰 및 관리자 화면에 도메인 정보가 노출됩니다. <br />
                    실제 쇼핑몰 접속 도메인의 추가 및 변경은 [도메인 연결/관리] 버튼을 통해서 가능합니다. <a class="btn-link" href="<?php echo $domainUrlList['guide']; ?>" target="_blank">도움말 바로가기></a>
                </div>
            </td>
        </tr>
        <tr>
            <th class="require">대표카테고리</th>
            <td colspan="3" class="form-inline">
                <input type="hidden" name="mallCategory" value="<?php echo $data['mallCategory']; ?>" <?php echo $readonly . $disabled; ?>/>
                <span id="mallCategory"><?php echo $data['mallCategory']; ?></span>
                <input type="button" onclick="mall_categoty();" value="대표카테고리 선택" <?php echo $disabled; ?> class="btn btn-gray btn-sm"/>
            </td>
        </tr>
    </table>

    <div class="table-title gd-help-manual">
        회사 정보
    </div>
    <table class="table table-cols">
        <colgroup>
            <col class="width-md"/>
            <col class="width-xl"/>
            <col class="width-md"/>
            <col/>
        </colgroup>
        <tr>
            <th>상호(회사명)</th>
            <td class="form-inline">
                <input type="text" name="companyNm" value="<?php echo $data['companyNm']; ?>" class="form-control width-md"/>
            </td>
            <th>사업자등록번호</th>
            <td class="form-inline">
                <div>
                    <input type="text" name="businessNo[]" value="<?php echo $data['businessNo'][0]; ?>" <?php echo $readonly . $disabled; ?> maxlength="3" class="form-control js-number-only width-3xs"/> -
                    <input type="text" name="businessNo[]" value="<?php echo $data['businessNo'][1]; ?>" <?php echo $readonly . $disabled; ?> maxlength="2" class="form-control js-number-only width-3xs"/> -
                    <input type="text" name="businessNo[]" value="<?php echo $data['businessNo'][2]; ?>" <?php echo $readonly . $disabled; ?> maxlength="5" class="form-control js-number-only width-3xs"/>
                </div>
                <div class="notice-info">
                    인터넷 쇼핑몰 운영자는 전자상거래법에 의해 사업자정보 공개페이지를 쇼핑몰 홈페이지 초기 화면에 연결해야 합니다.
                    <a href="https://www.nhn-commerce.com/customer/board-view.gd?type=notice&idx=1101" target="_blank" class="btn-link">자세히보기 ></a>
                </div>
                <div class="notice-info">
                    사업자번호를 입력하면 쇼핑몰 하단 푸터에 자동으로 사업자정보 공개페이지가 연결됩니다.
                    <a href="https://www.ftc.go.kr/www/contents.do?key=5375" target="_black" class="btn-link">통신판매사업자 정보 공개페이지 ></a>
                </div>
            </td>
        </tr>
        <tr>
            <th>대표자명</th>
            <td colspan="3" class="form-inline">
                <input type="text" name="ceoNm" value="<?php echo $data['ceoNm']; ?>" class="form-control width-lg"/>
            </td>
        </tr>
        <tr>
            <th>업태</th>
            <td class="form-inline">
                <input type="text" name="service" value="<?php echo $data['service']; ?>" <?php echo $readonly . $disabled; ?> class="form-control width-lg"/>
            </td>
            <th>종목</th>
            <td class="form-inline">
                <input type="text" name="item" value="<?php echo $data['item']; ?>" <?php echo $readonly . $disabled; ?> class="form-control width-lg"/>
            </td>
        </tr>
        <tr>
            <th class="require">대표 이메일</th>
            <td colspan="3" class="form-inline">
                <?php if (empty($mallSno) || $mallSno == DEFAULT_MALL_NUMBER) { ?>
                <div class="form-inline">
                    <label class="radio-inline">
                        <input type="radio" name="emailDefaultFl" value="default" onclick="default_toggle_email_info('email', true);" <?php echo gd_isset($checked['email']['default']); ?> /> 기본 이메일
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="emailDefaultFl" value="manual" onclick="default_toggle_email_info('email', false);" <?php echo gd_isset($checked['email']['manual']); ?> /> 직접 입력
                    </label>
                </div><br>
                <?php } ?>

                <input type="text" id="emailId" name="email[]" value="<?php echo $data['email'][0]; ?>" <?php echo gd_isset($deactivated['email']) . $disabled; ?> class="form-control width-lg"/> @
                <input type="text" id="email" name="email[]" value="<?php echo $data['email'][1]; ?>" <?php echo gd_isset($deactivated['email']) . $disabled; ?> class="form-control width-md js-email-domain"/>

                <div id="email_domain_y" class="display-inline-block">
                    <?php echo gd_select_box('email_domain', null, $emailDomain, null, $data['email'][1], null, $disabled, 'email_domain'); ?>
                </div>
                <div id="email_domain_n"></div>

                <div class="notice-info">
                    <ul>
                        <li>• 대표 이메일은 쇼핑몰에서 고객에게 메일 발송 시 기본 발송자 이메일 정보로 사용됩니다.</li>
                        <li>• 몰 생성 시 기본 이메일 주소로 설정됩니다.</li>
                        <li>• 25년 2월부터 네이버(naver) 이메일을 사용할 경우 메일 발송이 불가하오니 기본 이메일 사용을 권장합니다.</li>
                        <li>• 포탈(gmail, hanmail 등) 도메인으로 사용할 경우, 고객의 메일 수신이 차단될 수 있습니다.
                            <a class="btn-link" href="<?php echo $domainUrlList['guide_mail_cert']; ?>" target="_blank">메일 레코드 등록 가이드 보기 ></a>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
        <tr>
            <th>사업장 주소</th>
            <td colspan="3">
                <div class="form-inline mgb5">
                    <input type="text" name="zonecode" value="<?php echo $data['zonecode']; ?>" maxlength="5" class="form-control width-2xs"/>
                    <input type="hidden" name="zipcode" value="<?php echo $data['zipcode']; ?>"/>
                    <span id="zipcodeText" class="number <?php if (strlen($data['zipcode']) != 7) { echo 'display-none'; } ?>">(<?php echo $data['zipcode']; ?>)</span>
                    <input type="button" onclick="postcode_search('zonecode', 'address', 'zipcode');" value="우편번호찾기" class="btn btn-gray btn-sm"/>
                </div>
                <div class="form-inline">
                    <input type="text" name="address" value="<?php echo $data['address']; ?>" class="form-control width-2xl"/>
                    <input type="text" name="addressSub" value="<?php echo $data['addressSub']; ?>" class="form-control width-2xl"/>
                </div>
            </td>
        </tr>
        <tr>
            <th>출고지 주소</th>
            <td colspan="3">
                <div class="form-inline">
                    <label class="radio-inline">
                        <input type="radio" name="unstoringFl" value="same" onclick="display_toggle('unstoringFl','same');" <?php echo gd_isset($checked['unstoringFl']['same']); ?> />사업장 주소와 동일
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="unstoringFl" value="new" onclick="display_toggle('unstoringFl','new');" <?php echo gd_isset($checked['unstoringFl']['new']); ?> />주소 등록
                    </label>
                    <label class="radio-inline">
                        <input type="button" value="출고지 관리" class="btn btn-black btn-sm btn-unstoring" onclick="address_register('출고지', 'unstoringFl', 'unstoringFl_new', 'unstoringTable');"/>
                    </label>
                </div>
                <div id="unstoringFl_new" class="display-none">
                    <div class="form-inline mgt10 mgb5 unstoringTable <?= empty($data['unstoringInfo']) === false ? 'active' : '' ?>">
                        <?php foreach ($data['unstoringInfo'] as $k => $v) { ?>
                            <?php if ($v['addressFl'] == 'unstoring') { ?>
                                <input type="hidden" name="unstoringInfo[<?= $k ?>][unstoringNo]" value="<?php echo $data['unstoringInfo'][$k]['sno'] ?>"/>
                                <input type="hidden" name="unstoringInfo[<?= $k ?>][unstoringZonecode]" value="<?php echo $data['unstoringInfo'][$k]['unstoringZonecode'] ?>"/>
                                <input type="hidden" name="unstoringInfo[<?= $k ?>][unstoringZipcode]" value="<?php echo $data['unstoringInfo'][$k]['unstoringZipcode'] ?>"/>
                                <input type="hidden" name="unstoringInfo[<?= $k ?>][unstoringAddress]" value="<?php echo $data['unstoringInfo'][$k]['unstoringAddress'] ?>"/>
                                <input type="hidden" name="unstoringInfo[<?= $k ?>][unstoringAddressSub]" value="<?php echo $data['unstoringInfo'][$k]['unstoringAddressSub'] ?>"/>
                                <input type="hidden" name="unstoringInfo[<?= $k ?>][mainFl]" value="<?php echo $data['unstoringInfo'][$k]['mainFl'] ?>"/>
                                <table class="table table-cols" value="<?= $v['sno'] ?>">
                                    <colgroup>
                                        <col class="width-md"/>
                                        <col class="width-2lg"/>
                                        <col class="width-md"/>
                                    </colgroup>
                                    <tbody>
                                    <tr>
                                        <th>관리 명칭
                                            <span style="color: #117ef9">
                                                <?php if ($v['mainFl'] != 'n') { ?>
                                                    (기본)
                                                <?php } ?>
                                            </span>
                                        </th>
                                        <td colspan="3"><?= $v['unstoringNm'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>주소</th>
                                        <td colspan="3">
                                            <?php if ($v['postFl'] != 'y') { ?>
                                                <?= $v['unstoringZonecode'] ?>
                                                <?php if (strlen($v['unstoringZipcode']) === 7) { echo '(' . $v['unstoringZipcode'] . ')'; } ?>
                                            <?php } ?>
                                            <?= $v['unstoringAddress'] ?> <?= $v['unstoringAddressSub'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>연락처</th>
                                        <td><?= $v['mainContact'] ?></td>
                                        <th>추가 연락처</th>
                                        <td><?= $v['additionalContact'] ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <th>반품/교환지 주소</th>
            <td colspan="3" class="form-inline">
                <div class="form-inline">
                    <label class="radio-inline">
                        <input type="radio" name="returnFl" value="same" onclick="display_toggle('returnFl','same');" <?php echo gd_isset($checked['returnFl']['same']); ?> />사업장 주소와 동일
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="returnFl" value="unstoring" onclick="display_toggle('returnFl','same');" <?php echo gd_isset($checked['returnFl']['unstoring']); ?> />출고지 주소와 동일
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="returnFl" value="new" onclick="display_toggle('returnFl','new');" <?php echo gd_isset($checked['returnFl']['new']); ?> />주소 등록
                    </label>
                    <label class="radio-inline">
                        <input type="button" value="반품/교환지 관리" class="btn btn-black btn-sm btn-return" onclick="address_register('반품/교환지', 'returnFl', 'returnFl_new', 'returnTable');"/>
                    </label>
                </div>
                <div id="returnFl_new" class="display-none">
                    <div class="form-inline mgt10 mgb5 returnTable <?= empty($data['returnInfo']) === false ? 'active' : '' ?>">
                        <?php foreach ($data['returnInfo'] as $k => $v) { ?>
                            <?php if ($v['addressFl'] == 'return') { ?>
                                <input type="hidden" name="returnInfo[<?= $k ?>][returnNo]" value="<?php echo $data['returnInfo'][$k]['sno'] ?>"/>
                                <input type="hidden" name="returnInfo[<?= $k ?>][returnZonecode]" value="<?php echo $data['returnInfo'][$k]['unstoringZonecode'] ?>"/>
                                <input type="hidden" name="returnInfo[<?= $k ?>][returnZipcode]" value="<?php echo $data['returnInfo'][$k]['unstoringZipcode'] ?>"/>
                                <input type="hidden" name="returnInfo[<?= $k ?>][returnAddress]" value="<?php echo $data['returnInfo'][$k]['unstoringAddress'] ?>"/>
                                <input type="hidden" name="returnInfo[<?= $k ?>][returnAddressSub]" value="<?php echo $data['returnInfo'][$k]['unstoringAddressSub'] ?>"/>
                                <input type="hidden" name="returnInfo[<?= $k ?>][mainFl]" value="<?php echo $data['returnInfo'][$k]['mainFl'] ?>"/>
                                <table class="table table-cols" value="<?= $v['sno'] ?>">
                                    <colgroup>
                                        <col class="width-md"/>
                                        <col class="width-2lg"/>
                                        <col class="width-md"/>
                                    </colgroup>
                                    <tbody>
                                    <tr>
                                        <th>관리 명칭
                                            <span style="color: #117ef9">
                                                <?php if ($v['mainFl'] != 'n') { ?>
                                                    (기본)
                                                <?php } ?>
                                            </span>
                                        </th>
                                        <td colspan="3"><?= $v['unstoringNm'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>주소</th>
                                        <td colspan="3">
                                            <?php if ($v['postFl'] != 'y') { ?>
                                                <?= $v['unstoringZonecode'] ?>
                                                <?php if (strlen($v['unstoringZipcode']) === 7) { echo '(' . $v['unstoringZipcode'] . ')'; } ?>
                                            <?php } ?>
                                            <?= $v['unstoringAddress'] ?> <?= $v['unstoringAddressSub'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>연락처</th>
                                        <td><?= $v['mainContact'] ?></td>
                                        <th>추가 연락처</th>
                                        <td><?= $v['additionalContact'] ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <th>대표전화</th>
            <td class="form-inline">
                <input type="text" name="phone" value="<?php echo $data['phone']; ?>" maxlength="12" class="form-control js-number-only width-md"/>
            </td>
            <th>팩스번호</th>
            <td class="form-inline">
                <input type="text" name="fax" value="<?php echo $data['fax']; ?>" maxlength="12" class="form-control js-number-only width-md"/>
            </td>
        </tr>
        <tr>
            <th>통신판매신고번호</th>
            <td colspan="3" class="form-inline">
                <input type="text" name="onlineOrderSerial" value="<?php echo $data['onlineOrderSerial']; ?>" class="form-control width-sm"/>
            </td>
        </tr>
        <tr>
            <th>인감 이미지 등록</th>
            <td colspan="3" class="form-inline">
                <input type="file" name="stampImage" <?php echo $disabled; ?> class="form-control"/>
                <span>
                    <?php
                    if (empty($data['stampImage']) === false) {
                        echo gd_html_image(UserFilePath::data('etc', $data['stampImage'])->www(), '인감 이미지');
                        echo ' <label><input type="checkbox" name="stampImageDel" value="y" style="display:none"/><button ' . $disabled . ' class="btn btn-info btn-xs btn-red btnStampDelete">삭제</button></label>';
                    }
                    ?>
			    </span>
                <div class="notice-info">* 가로x세로 74픽셀, jpg/png/gif만 가능<br/>등록된 인감 이미지는 "일반 세금계산서, 간이영수증, 거래명세서" 등에 사용됩니다.</div>
            </td>
        </tr>
        <?php if (empty($mallSno) || $mallSno == DEFAULT_MALL_NUMBER) { ?>
        <tr>
            <th>현금영수증 가맹점<br>로고 하단푸터<br>노출여부</th>
            <td colspan="3" class="form-inline">
                <div class="form-inline">
                    <label class="radio-inline">
                        <input type="radio" name="receiptFl" value="default" onclick="display_toggle('receiptFl','default');" <?php echo gd_isset($checked['receiptFl']['default']); ?> />현금영수증 가맹점
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="receiptFl" value="liability" onclick="display_toggle('receiptFl','liability');" <?php echo gd_isset($checked['receiptFl']['liability']); ?> />현금영수증 의무발행 가맹점
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="receiptFl" value="upload" onclick="display_toggle('receiptFl','upload');" <?php echo gd_isset($checked['receiptFl']['upload']); ?> />노출 이미지 직접등록
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="receiptFl" value="n" onclick="display_toggle('receiptFl','n');" <?php echo gd_isset($checked['receiptFl']['n']); ?> />노출 안함
                    </label>
                </div>
                <div id="receiptFl_default" class="mgt10">
                    <img src="/admin/gd_share/img/logo_cash_receipt.png" alt="현금영수증 가맹점">
                </div>
                <div id="receiptFl_liability" class="mgt10">
                    <img src="/admin/gd_share/img/logo_cash_receipt_liability.png" alt="현금영수증 의무발행 가맹점">
                </div>
                <div id="receiptFl_upload" class="mgt10">
                    <input type="file" name="receiptImageFile" <?php echo $disabled; ?> class="form-control"/>
                    <div>
                    <?php
                    if (empty($data['receiptImage']) === false) {
                        echo gd_html_image(UserFilePath::data('commonimg', $data['receiptImage'])->www(), '현금영수증 가맹점 로고 이미지');
                        echo ' <label><input type="checkbox" name="receiptImageDel" value="y" style="display:none"/><button ' . $disabled . ' class="btn btn-info btn-xs btn-red btnImageDelete">삭제</button></label>';
                    }
                    ?>
			        </div>
                    <div class="notice-info">gif, png, jpe, jpeg, jpg, tif 파일 등록 가능합니다.</div>
                </div>
                <div id="receiptFl_n"></div>
            </td>
        </tr>
        <?php } ?>
    </table>

    <div class="table-title gd-help-manual">
        고객센터
    </div>
    <table class="table table-cols">
        <colgroup>
            <col class="width-md"/>
            <col class="width-2xl"/>
            <col class="width-md"/>
            <col/>
        </colgroup>
        <tr>
            <th>전화번호</th>
            <td class="form-inline">
                <div class="mgb5">
                    <?php
                    if ($mallCnt > 1 && $mallSno > 1) {
                        echo gd_select_box('centerPhoneHead', 'centerPhoneHead', $countryAddress, null, $data['centerPhoneHead'], '==선택==', null, 'form-control');
                    }
                    ?>
                    <input type="text" name="centerPhone" value="<?php echo $data['centerPhone']; ?>" maxlength="12" class="form-control js-number-only width-md"/>
                </div>
                <div>
                    <?php
                    if ($mallCnt > 1 && $mallSno > 1) {
                        echo gd_select_box('centerSubPhoneHead', 'centerSubPhoneHead', $countryAddress, null, $data['centerSubPhoneHead'], '==선택==', null, 'form-control');
                    }
                    ?>
                    <input type="text" name="centerSubPhone" value="<?php echo $data['centerSubPhone']; ?>" maxlength="15" class="form-control js-number-only width-md"/>
                </div>
            </td>
            <th>팩스번호</th>
            <td class="form-inline">
                <?php
                if ($mallCnt > 1 && $mallSno > 1) {
                    echo gd_select_box('centerFaxHead', 'centerFaxHead', $countryAddress, null, $data['centerFaxHead'], '==선택==', null, 'form-control');
                }
                ?>
                <input type="text" name="centerFax" value="<?php echo $data['centerFax']; ?>" maxlength="15" class="form-control js-number-only width-md"/>
            </td>
        </tr>
        <tr>
            <th>이메일</th>
            <td colspan="3" class="form-inline">
                <div class="form-inline">
                    <label class="radio-inline">
                        <input type="radio" name="centerEmailDefaultFl" value="default" onclick="default_toggle_email_info('centerEmail', true);" <?php echo gd_isset($checked['centerEmail']['default']); ?> /> 기본 이메일
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="centerEmailDefaultFl" value="manual" onclick="default_toggle_email_info('centerEmail', false);" <?php echo gd_isset($checked['centerEmail']['manual']); ?> /> 직접 입력
                    </label>
                </div><br>

                <input type="text" id="centerEmailId" name="centerEmail[]" value="<?php echo $data['centerEmail'][0]; ?>" class="form-control width-lg" <?php echo gd_isset($deactivated['centerEmail']); ?>/> @
                <input type="text" id="centerEmail" name="centerEmail[]" value="<?php echo $data['centerEmail'][1]; ?>" class="form-control width-md js-email-domain" <?php echo gd_isset($deactivated['centerEmail']); ?> />

                <div id="centerEmail_domain_y" class="display-inline-block">
                    <?php echo gd_select_box('center_email_domain', null, $emailDomain, null, $data['centerEmail'][1], null, null, 'email_domain'); ?>
                </div>
                <div id="centerEmail_domain_n"></div>
            </td>
        </tr>
        <tr>
            <th>운영시간</th>
            <td colspan="3" class="form-inline">
                <textarea name="centerHours" rows="4" class="form-control width-2xl"><?php echo $data['centerHours']; ?></textarea>
            </td>
        </tr>
    </table>

    <div class="table-title gd-help-manual">
        회사소개 내용 수정
    </div>
    <table class="table table-cols">
        <colgroup>
            <col class="width-md"/>
            <col/>
        </colgroup>
        <tr>
            <th>회사소개 내용</th>
            <td class="form-inline">
                <textarea name="company" id="editor" class="form-control width100p height400"><?php echo $data['company']; ?></textarea>
            </td>
        </tr>
    </table>

    </table>
</form>

<script type="text/javascript" src="<?= PATH_ADMIN_GD_SHARE ?>script/smart/js/service/HuskyEZCreator.js" charset="utf-8"></script>
<script type="text/javascript" src="<?= PATH_ADMIN_GD_SHARE ?>script/smart/js/editorLoad.js" charset="utf-8"></script>
<script type="text/javascript">
    <!--

    var unstoringNo = <?php echo json_encode($data['unstoringInfo']) ?>;
    var returnNo = <?php echo json_encode($data['returnInfo']) ?>;
    var $mallName = '<?= $mallName ?>';
    var $mallFl = '<?php echo $mallFl; ?>';
    var unstoringFl = '<?= empty($data['unstoringInfo']) ?>';
    var returnFl = '<?= empty($data['returnInfo']) ?>';
    var isOauthSuperManagerLoggedIn = <?= $isOauthSuperManagerLoggedIn ? 'true' : 'false'; ?>;
    var domainIntroUrl = '<?= $domainUrlList['intro']; ?>';
    var domainManageUrl = '<?= $domainUrlList['manage']; ?>';

    $(document).ready(function () {
        // 쇼핑몰 기본 정보 저장
        $("#frmBase").validate({
            submitHandler: function (form) {
                if($('input[name=receiptFl]:checked').val() == 'upload' && !$('input[name=receiptImageFile]').val() && !$('input[name=receiptImageTmp]').val()) {
                    alert('이미지를 선택하세요.');
                    return false;
                }
                oEditors.getById["editor"].exec("UPDATE_CONTENTS_FIELD", []);	// 에디터의 내용이 textarea에 적용됩니다.
                form.target = 'ifrmProcess';
                form.submit();
            },
            rules: {
                'mallDomain': "required",
                'mallCategory': "required",
                'email[]': "required",
            },
            messages: {
                'mallDomain': {
                    required: '쇼핑몰 도메인을 입력해 주세요.'
                },
                'mallCategory': {
                    required: '대표 카테고리를 입력해 주세요.'
                },
                'email[]': {
                    required: '대표 이메일을 입력해 주세요.'
                }
            }
        });

        display_toggle('unstoringFl','<?php echo gd_isset($data['unstoringFl']);?>');
        display_toggle('returnFl','<?php echo gd_isset($data['returnFl']);?>');
        display_toggle('robotsTxt','<?php echo gd_isset($data['robotsFl']);?>');
        display_toggle('receiptFl','<?php echo gd_isset($data['receiptFl']);?>');
        display_toggle_inline('email_domain', '<?php echo gd_isset($data['emailFl']);?>');
        display_toggle_inline('centerEmail_domain', '<?php echo gd_isset($data['centerEmailFl']);?>');

        $('.email_domain').change(function () {
            var val =  $(this).val() == 'self' ? '' :  $(this).val();
            $(this).closest('td').find('.js-email-domain').val(val);
        });

        $(".btnStampDelete").click(function() {
            if (confirm('등록한 인감이미지를 삭제하시겠습니까?') == false){
                $("input:checkbox[name='stampImageDel']").prop("checked",false);
                return false;
            } else {
                $("input:checkbox[name='stampImageDel']").prop("checked",true);
                $("frmBase").submit();
            }
        })

        $(".btnImageDelete").click(function() {
            if (confirm('등록한 현금영수증 가맹점 로고를 삭제하시겠습니까?') == false){
                $("input:checkbox[name='receiptImageDel']").prop("checked",false);
                return false;
            } else {
                $("input:checkbox[name='receiptImageDel']").prop("checked",true);
                $("frmBase").submit();
            }
        })

        $('input[type=\'radio\'][name=\'unstoringFl\'][value=\'new\']').on('click', function(){
            if (unstoringFl) {
                $('.btn-unstoring').trigger('click');
            }
        })

        $('input[type=\'radio\'][name=\'returnFl\'][value=\'new\']').on('click', function(){
            if (returnFl) {
                $('.btn-return').trigger('click');
            }
        })

    });

    function getSelectedAddressNo(tableID) {
        var uNo = [];

        if (tableID == 'unstoringTable') {
            for(var i in unstoringNo) {
                uNo[i] = unstoringNo[i].sno;
            }
        } else if (tableID == 'returnTable') {
            for(var i in returnNo) {
                uNo[i] = returnNo[i].sno;
            }
        }

        return uNo;
    }

    function resetBaseInfoAddressTable(tableID) {     // 주소 목록 레이어 팝업 클릭 시 기존 테이블 리셋
        $('.' + tableID).remove();
    }

    /**
     * 주소(출고지, 반품/교환지) 등록
     */
    function address_register(title, name, parentFormID, tableID) {
        $('input:radio[name=' + name + ']:input[value=new]').prop("checked", true);

        display_toggle(name, 'new');
        resetBaseInfoAddressTable(tableID);

        var addressNo = getSelectedAddressNo(tableID);
        var loadChk = $('#layerUnstoringListForm').length;
        var data = {
            'subTitle'  : title,
            'parentFormID' : parentFormID,
            'tableID'   : tableID,
            'unstoringNo' : addressNo,
            'mallName'      : $mallName,
            'mallFl'    : $mallFl,
            'unstoringFl'   : '<?php echo gd_isset($data['unstoringFl']);?>',
            'returnFl'      : '<?php echo gd_isset($data['returnFl']);?>',
            'mallSno'       : '<?php echo $mallSno;?>'
        };

        $.ajax({
            url : '../share/layer_unstoring_list.php',
            data : data,
            type : 'GET',
            success : function(data) {
                if (loadChk == 0) {
                    data = '<div id="layerUnstoringListForm">' + data + '</div>';
                }
                var layerForm = data;
                layer_popup(layerForm, title + ' 관리', 'wide');
            }
        });
    }

    /**
     * 대표 카테고리
     */
    function mall_categoty() {
        var loadChk = $('#layerCategotyForm').length;
        $.post('./layer_mall_categoty.php', '', function (data) {
            if (loadChk == 0) {
                data = '<div id="layerCategotyForm">' + data + '</div>';
            }
            var layerForm = data;
            layer_popup(layerForm, '대표카테고리 등록');
        });
    }

    /**
     * 출력 여부
     *
     * @param string thisIdKey 해당 ID Key
     */
    function display_toggle(thisId, thisIdKey) {
        $('div[id*=\''+thisId+'_\']').addClass('display-none');
        $('#'+thisId+'_'+thisIdKey).removeClass('display-none');
    }

    /**
     * display_toggle() 동작 + inline_block
     *
     * @param thisId
     * @param thisIdKey
     */
    function display_toggle_inline(thisId, thisIdKey) {
        $('div[id*=\''+thisId+'_\']').removeClass('display-inline-block');
        $('#'+thisId+'_'+thisIdKey).addClass('display-inline-block');
        display_toggle(thisId, thisIdKey);
    }

    /**
     * disabled 여부
     *
     * @param string  inputName 해당 input Box의 name
     * @param boolean modeBool 출력 여부 (true or false)
     */
    function default_switch(inputName, modeBool) {
        if ($('input[name=\'' + inputName + '\']').length) {
            $('input[name=\'' + inputName + '\']').prop('readonly', modeBool);
        } else if ($('select[name=\'' + inputName + '\']').length) {
            $('select[name=\'' + inputName + '\']').prop('readonly', modeBool);
        }
    }

    /**
     * 기본 이메일 선택에 화면 처리
     *
     * @param inputName
     * @param modeBool
     */
    function default_toggle_email_info(inputName, modeBool) {
        default_switch(inputName+'[]', modeBool);

        if (modeBool) {
            $('#'+inputName+'Id').val('no-reply');
            $('#'+inputName).val('godomall.com');
            display_toggle_inline(inputName+'_domain','n');
        } else {
            $('#'+inputName+'Id').val('');
            $('#'+inputName).val('');
            display_toggle_inline(inputName+'_domain','y');
        }
    }

    /**
     * 도메인 관리 관련 외부 URL 로 이동
     * @param type
     */
    function moveToExternalDomainUrl(type) {
        if (!isOauthSuperManagerLoggedIn) {
            dialog_alert('NHN 커머스 통합계정인 최고운영자만 접근 가능합니다.', '경고');
            return;
        }

        const DOMAIN_URLS = {
            intro: domainIntroUrl,
            manage: domainManageUrl
        };
        if (DOMAIN_URLS.hasOwnProperty(type)) {
            window.open(DOMAIN_URLS[type]);
        }
    }
    //-->
</script>
