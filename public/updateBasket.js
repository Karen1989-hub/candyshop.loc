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

$('#address1').change(function (){
    $('#address2').val($('#address1').val());
})







