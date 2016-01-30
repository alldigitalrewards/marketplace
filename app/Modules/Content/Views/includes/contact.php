
<form action="http://contact.alldigitalrewards.com/api/ZaQFhBo4QF8MhMtmCSQL" method="post" _lpchecked="1">
    <input type="hidden" name="_valid[firstname]" value="required">
    <input type="hidden" name="_valid[lastname]" value="required">
    <input type="hidden" name="_valid[email]" value="required|valid_email">
    <input type="hidden" name="_valid[comments]" value="required">

    <input type="hidden" name="_subject" value="Account Marketplace Submission">
    <input type="hidden" name="_replyto" value="csr@alldigitalrewards.com">
    <input type="hidden" name="bcc[]" value="zech@alldigitalrewards.com">
    <input type="hidden" name="_after" value="<?=$this->baseURL('content/contact/complete');?>">
    <input type="text" name="_honey" value="" style="display:none">
    <input name="source" type="text" id="source" style="display:none;" value="Account Marketplace Submission">

    <div class="row">
        <div class="col-md-6 col-xs-6">

            <div class="form-group">
                <label for="firstname">First Name *</label>
                <input class="form-control" type="text" name="firstname" id="firstname" value="" title="Your first name" />
            </div>

        </div>

        <div class="col-md-6 col-xs-6">

            <div class="form-group">
                <label for="lastname">Last Name *</label>
                <input type="text" name="lastname" id="lastname" value="" class="form-control" title="Your last name" />
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xs-6">

            <div class="form-group">
                <label for="email">Email Address *</label>
                <input type="text" name="email" id="email" value="" class="form-control" title="Your email address" />
            </div>
        </div>
        <div class="col-md-6 col-xs-6">

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" value="" class="form-control" title="Your phone" />
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="form-group">
                <label for="phone">Message *</label>
                <textarea class="form-control" placeholder="Regarding*" name="comments" id="comments" cols="50" rows="5" title="Information Details" style="resize:none;"></textarea>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12 text-right">
            <button class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
