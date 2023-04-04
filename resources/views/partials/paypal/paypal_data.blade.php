<div class="my-3 paypal-data">
    <input type="hidden" name="cmd" value="_cart">
    <input type="hidden" name="upload" value="1">
    <input type="hidden" name="no_note" value="0">
    <input type="hidden" name="bn" value="RB_BuyNow_WPS_IT">
    <input type="hidden" name="tax_cart" value="0.00">
    <input type="hidden" name="rm" value="2">
    <input type="hidden" name="business" value="{{ env('PAYPAL_BUSINNESS_EMAIL') }}">
    <input type="hidden" name="handling_cart" value="0">
    <input type="hidden" name="currency_code" value="EUR">
    <input type="hidden" name="lc" value="IT">
    <input type="hidden" name="return" value="{{ $route_paypal_return }}">
    <input type="hidden" name="cbt" value="Torna al sito">
    <input type="hidden" name="cancel_return" value="{{ $route_paypal_cancel }}">
</div>