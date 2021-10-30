
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
alert('sdf');
require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//Vue.component('lesson', require('./components/LessenNotification.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#Crm'
});

Echo.private('App.User.' + userId)
    .notification((notification) => {
        //console.log(notification);
        $.ajax({
            type:'GET',
            url: '/Crm/help/getnot',
            //(or btn btn-danger btn-circle
            data: { notification: notification },
            success: function (responsedata) {
                var snd = new Audio('/meaty.mp3');
                snd.play();
                var ntcount=parseInt($('#GFG_Span').html())+1;
                if(ntcount==1){
                    $('#GFG_Span').removeClass('desnone');
                    $('#GFG_Span').addClass('btn btn-danger btn-circle');
                }
                $('#GFG_Span').html(ntcount);
                $('#notapp').prepend(responsedata);

                //   setTimeout(function(){alert("Thank you!")},6000);
            }, error: function(xhr){
                alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
            }
        });

    });