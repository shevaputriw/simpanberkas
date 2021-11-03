    <!--**********************************
        Footer start
    ***********************************-->
    <!-- <div class="footer">
        <div class="copyright">
            <center><p>Copyright © 2021</p></center>
        </div>
    </div> -->
    <!--**********************************
        Footer end
    ***********************************-->

    <!--**********************************
        Support ticket button start
    ***********************************-->

    <!--**********************************
        Support ticket button end
    ***********************************-->
    <!-- </div> -->
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script>
        $(document).ready(function() {
            $('#contoh').DataTable();
        } );
    </script>
    <!-- Required vendors -->
    <script src="<?=base_url()?>/assets/focus/vendor/global/global.min.js"></script>
    <script src="<?=base_url()?>/assets/focus/js/quixnav-init.js"></script>
    <script src="<?=base_url()?>/assets/focus/js/custom.min.js"></script>


    <!-- Vectormap -->
    <script src="<?=base_url()?>/assets/focus/vendor/raphael/raphael.min.js"></script>
    <script src="<?=base_url()?>/assets/focus/vendor/morris/morris.min.js"></script>


    <script src="<?=base_url()?>/assets/focus/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?=base_url()?>/assets/focus/vendor/chart.js/Chart.bundle.min.js"></script>

    <script src="<?=base_url()?>/assets/focus/vendor/gaugeJS/dist/gauge.min.js"></script>

    <!--  flot-chart js -->
    <script src="<?=base_url()?>/assets/focus/vendor/flot/jquery.flot.js"></script>
    <script src="<?=base_url()?>/assets/focus/vendor/flot/jquery.flot.resize.js"></script>

    <!-- Owl Carousel -->
    <script src="<?=base_url()?>/assets/focus/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <!-- Counter Up -->
    <script src="<?=base_url()?>/assets/focus/vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="<?=base_url()?>/assets/focus/vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="<?=base_url()?>/assets/focus/vendor/jquery.counterup/jquery.counterup.min.js"></script>


    <script src="<?=base_url()?>/assets/focus/js/dashboard/dashboard-1.js"></script>
    <script src="<?=base_url()?>/assets/focus/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>/assets/focus/js/plugins-init/datatables.init.js"></script>

    <!-- <script>
        $(document).ready(function () {
        var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn'),
                allPrevBtn = $('.prevBtn');

        allWells.hide();

        navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                    $item = $(this);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-primary').addClass('btn-default');
                $item.addClass('btn-primary');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });
        
        allPrevBtn.click(function(){
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

                prevStepWizard.removeAttr('disabled').trigger('click');
        });

        allNextBtn.click(function(){
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='url']"),
                isValid = true;

            $(".form-group").removeClass("has-error");
            for(var i=0; i<curInputs.length; i++){
                if (!curInputs[i].validity.valid){
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }

            if (isValid)
                nextStepWizard.removeAttr('disabled').trigger('click');
        });

        $('div.setup-panel div a.btn-primary').trigger('click');
        });
    </script> -->
</body>
</html>