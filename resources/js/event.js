"use strict";

// 以下宣言でjquery 警告無視
/* jshint -W117 */
$(document).ready(() => {
    $('.btn-edit-comment').on('click', (e) => {
        $('.edit-comment-form').remove();
        const $wrapper = $(e.target).closest('.comment-wrapper');
        const $textarea = $('<textarea></textarea>');
        $textarea.addClass('form-control');
        $textarea.addClass('edit-comment-form');

        const id = $wrapper.data('id');
        const comment = $(`.comment-wrapper[data-id=${id}] .comment`).text();
        $textarea.val(comment);
        const $form = $(`#form-update[data-id=${id}]`);
        const $row = $('<div class="row"></div>').append($('<div class="col-8"></div>'));
        const $btnEdit = $('<button class="btn btn-sm btn-primary"></button>').text('更新');

        $form.append($textarea);
        $form.append($btnEdit);
        $row.append($form);

        $wrapper.append($row);
    });
});
