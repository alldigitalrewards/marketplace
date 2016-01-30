
<div class="container" id="columns">
    <!-- row -->
    <div class="row">
        <!-- Reward -->
        <div class="col-xs-12">

            <h3>Contact us</h3>
            <div class="row">
                <div class="col-md-7">
                    <p>
                        Please choose from one of the following options to contact All Digital Rewards
                    </p>
                    <p><strong>CALL</strong></p>
                    <p>To review your account activity, check on the status of your order, or all other customer services inquiries call 1-844-229-4411.</p>
                    <p><strong>WRITE</strong></p>
                    <p>
                        To make a payment or general correspondence:<br/><br/>
                        All Digital Rewards<br/>
                        P.O. Box 3480<br/>
                        Lake Havasu City, AZ 96403
                    </p>
                </div>
                <div class="col-md-5">
                    <?php if(!empty($complete) && $complete == true): ?>
                        <p class="alert alert-success text-center">Your inquiry has been submitted!</p>
                    <?php else:?>

                        <?php
                            $view = new \Zewa\View();
                            $view->setView('includes/contact');
                            $view->setLayout(false);
                            echo $view->render();
                        ?>

                    <?php endif;?>

                </div>
            </div>
        </div>

        <!-- ./reward-->
    </div>
</div>


