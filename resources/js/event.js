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

        $wrapper.append($textarea);
    });
});
