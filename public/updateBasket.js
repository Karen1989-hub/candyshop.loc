// $(document).ready(function (){
//     $('.basketUpdateForm').submit(function (evn){
//         evn.preventDefault();
//         let str = $(this).serialize();
//         console.log(str);
//         // $.ajax({
//         //     url: '/user/updateInBasket',
//         //     method: 'post',
//         //     data: str,
//         //
//         //     success: function (content){
//         //         console.log('okey');
//         //         //let arr = JSON.parse(content);
//         //         //console.log(arr)
//         //         //$('#root').html(arr.firstName+" "+arr.lastName);
//         //     }
//         // })
//     })
//
// });

$(document.ready(function(){
    $("#subUpdate").click(function(){
        $('basketUpdateForm').each(function(){
            let payload = $(this).serialize();
            console.log(payload);
            //Send payload via Ajax.
        });
    });
}));




