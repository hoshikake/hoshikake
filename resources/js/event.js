"use strict";

// 以下宣言でjquery 警告無視
/* jshint -W117 */
$(document).ready(() => {
    $('.btn-edit-comment').on('click', (e) => {
        const $wrapper = $(e.target).closest('.comment-wrapper');
        const $textarea = $('<textarea></textarea>');
        $wrapper.append($textarea);
    });
});
