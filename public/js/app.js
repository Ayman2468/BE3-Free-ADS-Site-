$(function () {
    $("#category").on("change",function(){
        let levelClass = $('#category').find('option:selected').attr('class');
        console.log(levelClass);
        $('#sub_category option').each(function () {
            let self = $(this);
            if (self.hasClass(levelClass)) {
                self.removeAttr('hidden');
                self.show();
            } else {
                self.hide();
            }
        });
    });
});

// $(function(){
//     $("#governorate").on("change",function(){
//         let levelClass = $('#governorate').find('option:selected').attr('class');
//         console.log(levelClass);
//         $('#city option').each(function () {
//             let self = $(this);
//             if (self.hasClass(levelClass)) {
//                 self.removeAttr('hidden');
//                 self.show();
//             } else {
//                 self.hide();
//             }
//         });
//     });
// });
// $(function(){
//     $("#brand").on("change",function(){
//         let levelClass = $('#brand').find('option:selected').attr('class');
//         console.log(levelClass);
//         $('#model option').each(function () {
//             let self = $(this);
//             if (self.hasClass(levelClass)) {
//                 self.removeAttr('hidden');
//                 self.show();
//             } else {
//                 self.hide();
//             }
//         });
//     });
// });



