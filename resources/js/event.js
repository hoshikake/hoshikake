"use strict";

// 以下宣言でjquery 警告無視
/* jshint -W117 */
$(document).ready(() => {
    $('.btn-edit-comment').on('click', (e) => {
        $('.fotm-edit-comment').remove();
        $('.btn-update-comment').remove();
        const $wrapper = $(e.target).closest('.comment-wrapper');
        const $textarea = $('<textarea name="comment"></textarea>');
        $textarea.addClass('form-control');
        $textarea.addClass('fotm-edit-comment');

        const id = $wrapper.data('id');
        const comment = $(`.comment-wrapper[data-id=${id}] .comment`).text();
        $textarea.val(comment);
        const $form = $(`.form-update[data-id=${id}]`);
        const $row = $('<div class="row"></div>');
        const $col8 = $('<div class="col-8"></div>');
        const $col3 = $('<div class="col-3"></div>');
        const $btnEdit = $('<button class="btn btn-sm btn-primary btn-update-comment"></button>').text('更新');

        $col8.append($textarea);
        $col3.append($btnEdit);
        $row.append($col8).append($col3);

        $form.append($row);

        $wrapper.append($form);

    });

    $('span').on("click", function() {
        if ($(this).attr('class') === 'selected') {
            // メニュー非表示
            $(this).removeClass('selected').next('ul').slideUp('fast');
        } else {
            // 表示しているメニューを閉じる
            $('span').removeClass('selected');
            $('ul').hide();
            // メニュー表示
            $(this).addClass('selected').next('ul').slideDown('fast');
        }
    });

    // マウスカーソルがメニュー上/メニュー外
    $('span,ul').hover(function(){
        over_flg = true;
    }, function(){
        over_flg = false;
    });

    // メニュー領域外をクリックしたらメニューを閉じる
    $('body').click(function() {
        if (over_flg == false) {
            $('span').removeClass('selected');
            $('ul').slideUp('fast');
        }
    });

});
