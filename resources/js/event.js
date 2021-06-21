"use strict";

// 以下宣言でjquery 警告無視
/* jshint -W117 */
$(document).ready(() => {
    $('.btn-edit-comment').on('click', (e) => {

        /**
         * 当初BSで作ってたけど自作めんどいからやめたやーつ
         */

        $('.form-edit-comment').remove();
        $('.btn-update-comment').remove();
        const $wrapper = $(e.target).closest('.comment-wrapper');
        const $textarea = $('<textarea name="comment" required></textarea>');
        $textarea.addClass('form-edit-comment');

        const id = $wrapper.data('id');
        const comment = $(`.comment-wrapper[data-id=${id}] .comment`).text();
        $textarea.val(comment);
        const $formEdit = $(`.form-update[data-id=${id}]`);
        const $formDestroy = $(`.form-destroy[data-id=${id}]`);

        const $rowEdit = $('<div class="row"></div>');
        const $rowDestroy = $('<div class="row"></div>');
        const $col8 = $('<div class="col-8"></div>');
        const $col3 = $('<div class="col-3"></div>');
        const $colDestroy = $('<div class="col-destroy"></div>');
        const $btnEdit = $('<button class="btn-update-comment"></button>').text('更新');
        const $btnDestroy = $('<button class="btn-destroy-comment"></button>').text('削除');

        $col8.append($textarea);
        $col3.append($btnEdit);
        $colDestroy.append($btnDestroy);

        $rowEdit.append($col8).append($col3);
        $rowDestroy.append($colDestroy);

        $formEdit.append($rowEdit);
        $formDestroy.append($rowDestroy);

        $wrapper.append($formEdit);
        $wrapper.append($formDestroy);

    });

    $("ul.menu li").hover(
        function() {
          $(".menu-sub:not(:animated)", this).slideDown();
        },
        function() {
          $(".menu-sub", this).slideUp();
        }
      );
});
