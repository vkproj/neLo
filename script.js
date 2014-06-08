$(document).ready(function(){
        $('.login-button').click(openLModal);
        $('.register-button').click(openRModal);

        $(".dark-bg, .close").click(closeModal);

       // $('.close').click(closeModal);

       $(".l-modal").click(function(e){
                e.stopPropagation();

       });

       $(".r-modal").click(function(e){
                e.stopPropagation();

       });
       
        function closeModal(){
                $('.dark-bg').fadeOut(200);
                $('.l-modal').fadeOut(200);
                $('.r-modal').fadeOut(200);
        };
       
        function openLModal(){
                $('.dark-bg').fadeIn(200);
                $($(this).data("modal")).fadeIn(200);

        };

        function openRModal(){
                $('.dark-bg').fadeIn(200);
                $($(this).data("modal")).fadeIn(200);

        };

        $(".circle").hover(Circle);

        function Circle() {
          $('.circle').fadeIn(200);
        }
});
