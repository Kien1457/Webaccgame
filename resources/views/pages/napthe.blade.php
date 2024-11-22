<div class="c-content-box c-size-lg c-overflow-hide c-bg-white font-roboto">
    <div class="container">
    </div>
    <div class="text-center" style="margin-bottom: 50px;">
        <h2 style="font-size: 30px;font-weight: bold;text-transform: uppercase">DỊCH VỤ MUA THẺ </h2>
    </div>
    <form method="POST" action="https://nick.vn/mua-the" accept-charset="UTF-8" class="" enctype="multipart/form-data"
        data-hs-cf-bound="true">
        <input name="_token" type="hidden" value="FArKiDKUx5qLkQ607AMswlQoIx7lC3kczIIBXb8t">
        <div class="container detail-service">
            <div class="row">
                <div class="col-md-8" style="margin-bottom:20px;">
                    <div class="service-info">
                        <div class="col-md-5 hidden-xs hidden-sm">
                            <div class="">
                                <div class="news_image">
                                    <img src="/assets/frontend/images/store-card.jpg" alt="png-image">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <span class="mb-15 control-label bb">Chọn nhà mạng:</span>
                            <div class="mb-15">
                                <select name="telecom_key" id="telecom_key" class="server-filter form-control t14"
                                    style="">
                                    <option value="VIETTEL">Viettel</option>
                                    <option value="SOHACOIN">SohaCoin</option>
                                    <option value="VINAPHONE">Vinaphone</option>
                                    <option value="MOBIFONE">Mobifone</option>
                                    <option value="CARROT">Thẻ Carot (Team)</option>
                                    <option value="ZING">Zing Card( Vina Game)</option>
                                    <option value="VCOIN">Vcoin (VTC Online)</option>
                                    <option value="GATE">Gate (FPT Online)</option>
                                    <option value="GARENA">Garena</option>
                                    <option value="SCOIN">Scoin ( VTC Mobile)</option>
                                    <option value="APPOTA">Appota</option>
                                    <option value="VIETNAMOBILE">Vietnamobile</option>
                                    <option value="FUNCARD">Funcard</option>
                                    <option value="GOSU">Gosu</option>
                                </select>
                            </div>
                            <span class="mb-15 control-label bb">Mệnh giá:</span>
                            <div class="mb-15">
                                <select name="amount" id="amount" class="server-filter form-control t14"
                                    style="">
                                    <option r-default="0" value="10000" rel-ratio="100.0">10,000 VNĐ - 0%</option>
                                    <option r-default="0" value="20000" rel-ratio="100.0">20,000 VNĐ - 0%</option>
                                    <option r-default="0" value="50000" rel-ratio="97.0">50,000 VNĐ - 3%</option>
                                    <option r-default="0" value="100000" rel-ratio="97.0">100,000 VNĐ - 3%</option>
                                    <option r-default="0" value="200000" rel-ratio="97.0">200,000 VNĐ - 3%</option>
                                    <option r-default="0" value="500000" rel-ratio="97.0">500,000 VNĐ - 3%</option>
                                </select>
                            </div>
                            <span class="mb-15 control-label bb">Số lượng:</span>
                            <div class="mb-15">
                                <select name="quantity" id="quantity" class="server-filter form-control t14"
                                    style="">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class=" emply-btns text-center">
                                <a id="txtPrice" style="font-size: 20px;font-weight: bold" class="">Tổng: 10,000
                                    VNĐ</a>
                                <a style="font-size: 20px;" class="followus" href="/login" title=""><i
                                        class="fa fa-key" aria-hidden="true"></i> Đăng nhập để thanh toán</a>
                            </div>
                        </div>
                    </div>
                    <div class="row box-body" style="color: #505050;padding:20px;line-height: 2;margin-top: 30px">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


<script>
    $(document).ready(function() {
        $('#btnPurchase').click(function() {

            $('#homealert').modal('show');
        });



        GetAmount();
        $("#telecom_key").on('change', function() {
            GetAmount();

        });

        $("#amount").on('change', function() {
            UpdatePrice();
        });

        $("#quantity").on('change', function() {
            UpdatePrice();
        });

        function GetAmount() {

            var telecom_key = $("#telecom_key").val();
            var getamount = $.get("/mua-the/get-amount?telecom_key=" + telecom_key, function(data, status) {

                $("#amount").find('option').remove();
                $("#amount").html(data).val($("#amount option:first").val());;
                UpdatePrice();
            }).done(function() {

            }).fail(function() {

                alert("Không tìm thấy mệnh giá phù hợp");
            })
        }

        function UpdatePrice() {
            var amount = $("#amount").val();
            var ratio = $('#amount option:selected').attr('rel-ratio');
            var quantity = $("#quantity").val();

            if (amount == '' || amount == null || ratio == '' || ratio == null || quantity == '' || quantity ==
                null) {

                $('#txtPrice').html('Tổng: ' + 0 + ' VNĐ');
                $('#txtPrice').removeClass().addClass('bounceIn animated').one(
                    'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
                    function() {
                        $(this).removeClass();
                    });
                console.log('amount:' + amount);
                console.log('ratio:' + ratio);
                console.log('quantity:' + quantity);
                return;
            }



            if (ratio <= 0 || ratio == "" || ratio == null) {
                ratio = 100;
            }

            var sale = amount - (amount * ratio / 100);

            var total = (amount - sale) * quantity;
            $('#txtPrice').html('Tổng: ' + total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' VNĐ');
            $('#txtPrice').removeClass().addClass('bounceIn animated').one(
                'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
                function() {
                    $(this).removeClass();
                });

        }

    });
</script>
