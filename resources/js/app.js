/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
//require('codemirror/lib/codemirror');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

// Custom scripts

$(document).ready(function(){

    // set codemirror on textarea
   // var editor = CodeMirror.fromTextArea($('textarea'), {
    // lineNumbers: true
    //});
    
    // set active on sidebar items
    const sidebarItem = $('.nav .nav-item .nav-link');
    sidebarItem.each(function(){
        if (window.location.href == $(this).attr('href')){
            $(this).parent().addClass('active');
        }
    });

    // create alias from post title
    $("input[name='title']").keyup(function(){
        var Text = $(this).val();
        Text = Text.toLowerCase();
        var regExp = /\s+/g;
        Text = Text.replace(regExp,'-');
        $("input[name='alias']").val(Text);        
    });

    // hide form image upload preview on load
    $('.image-preview').hide();
    $('.form-control-file').on('change', function(e){
        e.stopPropagation();
        const input = $(this);
        console.log(`A file with name of ${input[0].files[0].name} has been added`);
        if (input[0].files && input[0].files[0]) {
  
            const reader = new FileReader();
        
            reader.onload = function(e) {
              $('.image-preview').show();
              $('.image-preview img').attr('src', e.target.result);
            };
        
            reader.readAsDataURL(input[0].files[0]);
        
        } 
    });

    $('.posts-listing .card .btn-danger').click(function(e){
        e.preventDefault();
        let el = $(this);
        let action = el.data('action');
        if (action) {
            axios.delete(action)
                .then(function(res){
                    console.log(res.data.message);
                    el.closest('.card').fadeOut('slow');
                })
                .catch(function(err){
                    throw new Error(err);
                });
        }
    });

});