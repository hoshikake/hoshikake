"use strict";

// 以下宣言でjquery 警告無視
/* jshint -W117 */
$(document).ready(() => {
    $('.btn-edit-comment').on('click', (e) => {
        $('.edit-comment-form').remove();
        const $wrapper = $(e.target).closest('.comment-wrapper');
        const $textarea = $('<textarea name="comment"></textarea>');
        $textarea.addClass('form-control');
        $textarea.addClass('edit-comment-form');

        const id = $wrapper.data('id');
        const comment = $(`.comment-wrapper[data-id=${id}] .comment`).text();
        $textarea.val(comment);
        const $form = $(`#form-update[data-id=${id}]`);
        const $row = $('<div class="row"></div>');
        const $col8 = $('<div class="col-8"></div>');
        const $col3 = $('<div class="col-3"></div>');
        const $btnEdit = $('<button class="btn btn-sm btn-primary"></button>').text('更新');

        $col8.append($textarea);
        $col3.append($btnEdit);
        $row.append($col8).append($col3);

        $form.append($row);

        $wrapper.append($form);
    });
});
