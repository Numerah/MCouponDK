/**
 * Created by numerah on 6/16/14.
 */


$(function() {
    var $tabs = $('#tabs').tabs();

    $(".ui-tabs-panel").each(function(i){

        var totalSize = $(".ui-tabs-panel").size() - 1;

        if (i != totalSize) {
            next = i + 1;
            $(this).append("<a href='#' class='next-tab mover' rel='" + next + "'>Next &#187;</a>");
        }

        if (i != 0) {
            prev = i - 1;
            $(this).append("<a href='#' class='prev-tab mover' rel='" + prev + "'>&#171; Previous</a>");
        }

    });

    $('.next-tab, .prev-tab').click(function() {
        $tabs.tabs("option", "active", $(this).attr("rel"));
        return false;
    });

$('#apb_appassbundle_mappearance_backgroundColorCode').minicolors({
    opacity: false,
    defaultValue: '#ffffff',
    control: 'hue',
    position: 'top right',
    textfield: false,
    change: function(hex, opacity) {
    $('#picker').val(hex);
    colourSet = hex;
    $('#colour').val(colourSet);
    }
});

$('#apb_appassbundle_mappearance_fieldLabelColorCode').minicolors({
    opacity: false,
    defaultValue: '#000000',
    control: 'hue',
    position: 'top right',
    textfield: false,
    change: function(hex, opacity) {
    $('#picker').val(hex);
    colourSet = hex;
    $('#colour').val(colourSet);
    }
});
$('#apb_appassbundle_mappearance_fieldValueColorCode').minicolors({
    opacity: false,
    defaultValue: '#000000',
    control: 'hue',
    position: 'top right',
    textfield: false,
    change: function(hex, opacity) {
    $('#picker').val(hex);
    colourSet = hex;
    $('#colour').val(colourSet);
    }
});

$('#apb_appassbundle_mrelevance_couponRelevanceLocationAddressOne').geocomplete();
$('#apb_appassbundle_mrelevance_couponRelevanceLocationAddressTwo').geocomplete();
$('#apb_appassbundle_mrelevance_couponRelevanceLocationAddressThree').geocomplete();
$('#apb_appassbundle_mrelevance_couponRelevanceLocationAddressFour').geocomplete();
$('#apb_appassbundle_mrelevance_couponRelevanceLocationAddressFive').geocomplete();
$('#apb_appassbundle_mrelevance_couponRelevanceLocationAddressSix').geocomplete();
$('#apb_appassbundle_mrelevance_couponRelevanceLocationAddressSeven').geocomplete();
$('#apb_appassbundle_mrelevance_couponRelevanceLocationAddressEight').geocomplete();
$('#apb_appassbundle_mrelevance_couponRelevanceLocationAddressNine').geocomplete();
$('#apb_appassbundle_mrelevance_couponRelevanceLocationAddressTen').geocomplete();

});
$(document).on("click","#myform input[type=submit]",function(event){
    if($("#apb_appassbundle_mdatasetting_couponBarcodeFixedValue").val() == ""
        && $("#apb_appassbundle_mdatasetting_couponBarcodeStatus").val() == "show"
        && $("#apb_appassbundle_mdatasetting_couponBarcodeDynamicValue").val() == ""
        && $("#apb_appassbundle_mdatasetting_couponAutoGenerateValueLength").val() == "length"
        && $("#apb_appassbundle_mdatasetting_barcodeAlternateDynamicText").val() == ""
        && $("#apb_appassbundle_mdatasetting_barcodeAlternateFixedText").val() == "")
    {
        event.preventDefault();
        alert("barcode value cannot be empty");
    }
    else if($("#apb_appassbundle_mgeneral_templateName").val() == ""
        || $("#apb_appassbundle_mgeneral_organizationName").val() == ""
        || $("#apb_appassbundle_mgeneral_organizationDescription").val() == ""
        || $("#apb_appassbundle_mappearance_logoText").val() == "")
    {
        event.preventDefault();
        alert("Name ,Template , Organization , Organizational Description and Logo cannot be empty");
    }

    else{
    }
});
$(document).ready(function (){

    $("#apb_appassbundle_mappearance_genericThumbnail").hide();
    $('label[for=apb_appassbundle_mappearance_genericThumbnail]').hide();
    $("#apb_appassbundle_mdistribution_limitValue").hide();
    $('label[for=apb_appassbundle_mdistribution_limitValue]').hide();
    $("#apb_appassbundle_mdistribution_restrictedDate").hide();
    $('label[for=apb_appassbundle_mdistribution_restrictedDate]').hide();
    $("#apb_appassbundle_mdistribution_fixedIssuePassword").hide();
    $('label[for=apb_appassbundle_mdistribution_fixedIssuePassword]').hide();
    $("#apb_appassbundle_mdistribution_singleUsePasswords").hide();
    $('label[for=apb_appassbundle_mdistribution_singleUsePasswords]').hide();
    $("#apb_appassbundle_mdistribution_fixedUpdatePassword").hide();
    $('label[for=apb_appassbundle_mdistribution_fixedUpdatePassword]').hide();

    $( "#tabs" ).tabs();
    $("#apb_appassbundle_mgeneral_boardingPassTransit").hide();
    $("#apb_appassbundle_mdatasetting_couponBarcodeValueSource").hide();
    $('label[for=apb_appassbundle_mdatasetting_couponBarcodeValueSource]').hide();
    $("#apb_appassbundle_mdatasetting_couponAutoGenerateValueType").hide();
    $('label[for=apb_appassbundle_mdatasetting_couponAutoGenerateValueType]').hide();
    $("#apb_appassbundle_mdatasetting_couponAutoGenerateValueLength").hide();
    $("#apb_appassbundle_mdatasetting_couponBarcodeDynamicValue").hide();
    $('label[for=apb_appassbundle_mdatasetting_couponBarcodeDynamicValue]').hide();
    $("#apb_appassbundle_mdatasetting_barcodeAlternateFixedText").hide();
    $('label[for=apb_appassbundle_mdatasetting_barcodeAlternateFixedText]').hide();
    $("#apb_appassbundle_mdatasetting_barcodeAlternateDynamicText").hide();
    $('label[for=apb_appassbundle_mdatasetting_barcodeAlternateDynamicText]').hide();
    $('label[for=apb_appassbundle_mgeneral_boardingPassTransit]').hide();
    $("#apb_appassbundle_mappearance_boardingPassFooter").hide();
    $('label[for=apb_appassbundle_mappearance_boardingPassFooter]').hide();
    $("#apb_appassbundle_mappearance_couponStrip").show();
    $('label[for=apb_appassbundle_mappearance_couponStrip]').show();
    $("#apb_appassbundle_mappearance_storeCardStrip").hide();
    $('label[for=apb_appassbundle_mappearance_storeCardStrip]').hide();
    $("#apb_appassbundle_mappearance_eventTicketStatus").hide();
    $('label[for=apb_appassbundle_mappearance_eventTicketStatus]').hide();
    $("#apb_appassbundle_mappearance_eventTicketStrip").hide();
    $('label[for=apb_appassbundle_mappearance_eventTicketStrip]').hide();
    $("#apb_appassbundle_mappearance_eventTicketThumbnail").hide();
    $('label[for=apb_appassbundle_mappearance_eventTicketThumbnail]').hide();
    $("#apb_appassbundle_mappearance_eventTicketBackground").hide();
    $('label[for=apb_appassbundle_mappearance_eventTicketBackground]').hide();

    $("#header1").show();
    $("#header2").hide();
    $("#header3").hide();
    $("#header4").hide();
    $("#primary1").show();
    $("#primary2").hide();
    $("#primary3").hide();
    $("#primary4").hide();
    $("#sf11").show();
    $("#sf12").hide();
    $("#sf13").hide();
    $("#sf14").hide();
    $("#sf21").show();
    $("#sf22").hide();
    $("#sf23").hide();
    $("#sf24").hide();
    $("#sf31").show();
    $("#sf32").hide();
    $("#sf33").hide();
    $("#sf34").hide();
    $("#sf41").show();
    $("#sf42").hide();
    $("#sf43").hide();
    $("#sf44").hide();
    $("#af11").show();
    $("#af12").hide();
    $("#af13").hide();
    $("#af14").hide();
    $("#af21").show();
    $("#af22").hide();
    $("#af23").hide();
    $("#af24").hide();
    $("#af31").show();
    $("#af32").hide();
    $("#af33").hide();
    $("#af34").hide();
    $("#af41").show();
    $("#af42").hide();
    $("#af43").hide();
    $("#af44").hide();
    $("#sf1").hide();
    $("#sf2").hide();
    $("#sf3").hide();
    $("#sf4").hide();
    $("#haf").hide();
    $("#af1").hide();
    $("#af2").hide();
    $("#af3").hide();
    $("#af4").hide();
    $("#bf1").hide();
    $("#bf2").hide();
    $("#bf3").hide();
    $("#bf4").hide();
    $("#bf5").hide();
    $("#bf6").hide();
    $("#bf7").hide();
    $("#bf8").hide();
    $("#bf9").hide();
    $("#bf10").hide();
    $("#rl1").hide();
    $("#rl2").hide();
    $("#rl3").hide();
    $("#rl4").hide();
    $("#rl5").hide();
    $("#rl6").hide();
    $("#rl7").hide();
    $("#rl8").hide();
    $("#rl9").hide();
    $("#rl10").hide();
    $("#ads2").hide();

    $("#apb_appassbundle_mdistribution_quantityRestriction").change(function(){

        if($(this).val() == 'limited') {

            $("#apb_appassbundle_mdistribution_limitValue").show();
            $('label[for=apb_appassbundle_mdistribution_limitValue]').show();
        }
        else
        {
            $("#apb_appassbundle_mdistribution_limitValue").hide();
            $('label[for=apb_appassbundle_mdistribution_limitValue]').hide();
        }

    });

    $("#apb_appassbundle_mdistribution_dateRestriction").change(function(){

        if($(this).val() == 'date') {

            $("#apb_appassbundle_mdistribution_restrictedDate").show();
            $('label[for=apb_appassbundle_mdistribution_restrictedDate]').show();
        }
        else
        {
            $("#apb_appassbundle_mdistribution_restrictedDate").hide();
            $('label[for=apb_appassbundle_mdistribution_restrictedDate]').hide();
        }

    });
    $("#apb_appassbundle_mdistribution_passwordIssueStatus").change(function(){

        if($(this).val() == 'fixedpass') {

            $("#apb_appassbundle_mdistribution_fixedIssuePassword").show();
            $('label[for=apb_appassbundle_mdistribution_fixedIssuePassword]').show();
            $('label[for=apb_appassbundle_mdistribution_singleUsePasswords]').hide();
            $("#apb_appassbundle_mdistribution_singleUsePasswords").hide();
        }
        else if ($(this).val() == 'singleusepass')
        {
            $("#apb_appassbundle_mdistribution_fixedIssuePassword").hide();
            $('label[for=apb_appassbundle_mdistribution_fixedIssuePassword]').hide();
            $('label[for=apb_appassbundle_mdistribution_singleUsePasswords]').show();
            $("#apb_appassbundle_mdistribution_singleUsePasswords").show();
        }
        else
        {
            $("#apb_appassbundle_mdistribution_fixedIssuePassword").hide();
            $('label[for=apb_appassbundle_mdistribution_fixedIssuePassword]').hide();
            $('label[for=apb_appassbundle_mdistribution_singleUsePasswords]').hide();
            $("#apb_appassbundle_mdistribution_singleUsePasswords").hide();
        }

    });

    $("#apb_appassbundle_mdistribution_passwordUpdateStatus").change(function(){

        if($(this).val() == 'fixedpass') {

            $("#apb_appassbundle_mdistribution_fixedUpdatePassword").show();
            $('label[for=apb_appassbundle_mdistribution_fixedUpdatePassword]').show();
        }
        else{
            $("#apb_appassbundle_mdistribution_fixedUpdatePassword").hide();
            $('label[for=apb_appassbundle_mdistribution_fixedUpdatePassword]').hide();
        }

    });

    $("#apb_appassbundle_madvanced_limitTotalPass").change(function(){

        if($(this).val() == 'set') {

            $("#ads2").show();
        }
        else{
            $("#ads2").hide();
        }

    });

    $("#apb_appassbundle_madvanced_passGenerateSetting").change(function(){

        if($(this).val() == 'unique') {

            $("#ads1").show();
        }
        else{
            $("#ads1").hide();
        }

    });

    $("#apb_appassbundle_mrelevance_couponRelevanceLocationTotalFields").change(function(){

        if($(this).val() == 0) {

            $("#rl1").hide();
            $("#rl2").hide();
            $("#rl3").hide();
            $("#rl4").hide();
            $("#rl5").hide();
            $("#rl6").hide();
            $("#rl7").hide();
            $("#rl8").hide();
            $("#rl9").hide();
            $("#rl10").hide();

        }
        else if($(this).val() == 1){

            $("#rl1").show();
            $("#rl2").hide();
            $("#rl3").hide();
            $("#rl4").hide();
            $("#rl5").hide();
            $("#rl6").hide();
            $("#rl7").hide();
            $("#rl8").hide();
            $("#rl9").hide();
            $("#rl10").hide();
        }
        else if($(this).val() == 2){

            $("#rl1").show();
            $("#rl2").show();
            $("#rl3").hide();
            $("#rl4").hide();
            $("#rl5").hide();
            $("#rl6").hide();
            $("#rl7").hide();
            $("#rl8").hide();
            $("#rl9").hide();
            $("#rl10").hide();
        }
        else if($(this).val() == 3){

            $("#rl1").show();
            $("#rl2").show();
            $("#rl3").show();
            $("#rl4").hide();
            $("#rl5").hide();
            $("#rl6").hide();
            $("#rl7").hide();
            $("#rl8").hide();
            $("#rl9").hide();
            $("#rl10").hide();
        }
        else if($(this).val() == 4){

            $("#rl1").show();
            $("#rl2").show();
            $("#rl3").show();
            $("#rl4").show();
            $("#rl5").hide();
            $("#rl6").hide();
            $("#rl7").hide();
            $("#rl8").hide();
            $("#rl9").hide();
            $("#rl10").hide();
        }
        else if($(this).val() == 5){

            $("#rl1").show();
            $("#rl2").show();
            $("#rl3").show();
            $("#rl4").show();
            $("#rl5").show();
            $("#rl6").hide();
            $("#rl7").hide();
            $("#rl8").hide();
            $("#rl9").hide();
            $("#rl10").hide();

        }
        else if($(this).val() == 6){

            $("#rl1").show();
            $("#rl2").show();
            $("#rl3").show();
            $("#rl4").show();
            $("#rl5").show();
            $("#rl6").show();
            $("#rl7").hide();
            $("#rl8").hide();
            $("#rl9").hide();
            $("#rl10").hide();
        }
        else if($(this).val() == 7){

            $("#rl1").show();
            $("#rl2").show();
            $("#rl3").show();
            $("#rl4").show();
            $("#rl5").show();
            $("#rl6").show();
            $("#rl7").show();
            $("#rl8").hide();
            $("#rl9").hide();
            $("#rl10").hide();
        }
        else if($(this).val() == 8){

            $("#rl1").show();
            $("#rl2").show();
            $("#rl3").show();
            $("#rl4").show();
            $("#rl5").show();
            $("#rl6").show();
            $("#rl7").show();
            $("#rl8").show();
            $("#rl9").hide();
            $("#rl10").hide();
        }
        else if($(this).val() == 9){


            $("#rl1").show();
            $("#rl2").show();
            $("#rl3").show();
            $("#rl4").show();
            $("#rl5").show();
            $("#rl6").show();
            $("#rl7").show();
            $("#rl8").show();
            $("#rl9").show();
            $("#rl10").hide();
        }
        else if($(this).val() == 10){

            $("#rl1").show();
            $("#rl2").show();
            $("#rl3").show();
            $("#rl4").show();
            $("#rl5").show();
            $("#rl6").show();
            $("#rl7").show();
            $("#rl8").show();
            $("#rl9").show();
            $("#rl10").show();
        }
        else{

        }

    });
    $("#apb_appassbundle_msecondary_couponSecondaryFieldTotalFields").change(function(){

        if($(this).val() == 0) {

            $("#sf1").hide();
            $("#sf2").hide();
            $("#sf3").hide();
            $("#sf4").hide();
        }
        else if($(this).val() == 1){

            $("#sf1").show();
            $("#sf2").hide();
            $("#sf3").hide();
            $("#sf4").hide();
        }
        else if($(this).val() == 2){

            $("#sf1").show();
            $("#sf2").show();
            $("#sf3").hide();
            $("#sf4").hide();
        }
        else if($(this).val() == 3){
            if ($("#apb_appassbundle_mgeneral_categoryName").val() == "Coupon"){
                $("#sf1").show();
                $("#sf2").show();
                $("#sf3").hide();
                $("#sf4").hide();
            }
            else {
                $("#sf1").show();
                $("#sf2").show();
                $("#sf3").show();
                $("#sf4").hide();
            }
        }
        else if($(this).val() == 4){

            if ($("#apb_appassbundle_mgeneral_categoryName").val() == "Coupon"){
                $("#sf1").show();
                $("#sf2").show();
                $("#sf3").hide();
                $("#sf4").hide();
            }
            else {
                $("#sf1").show();
                $("#sf2").show();
                $("#sf3").show();
                $("#sf4").show();
            }
        }
        else{

        }

    });
    $("#apb_appassbundle_mauxiliary_couponAuxiliaryFieldTotalFields").change(function(){

        $("#haf").hide();
        if($(this).val() == 0) {

            $("#af1").hide();
            $("#af2").hide();
            $("#af3").hide();
            $("#af4").hide();
        }
        else if($(this).val() == 1){

            $("#af1").show();
            $("#af2").hide();
            $("#af3").hide();
            $("#af4").hide();
        }
        else if($(this).val() == 2){

            $("#af1").show();
            $("#af2").show();
            $("#af3").hide();
            $("#af4").hide();
        }
        else if($(this).val() == 3){
            if ($("#apb_appassbundle_mgeneral_categoryName").val() == "Coupon"){
                $("#af1").show();
                $("#af2").show();
                $("#af3").hide();
                $("#af4").hide();
            }
            else {
                $("#af1").show();
                $("#af2").show();
                $("#af3").show();
                $("#af4").hide();
            }
        }
        else if($(this).val() == 4){

            if ($("#apb_appassbundle_mgeneral_categoryName").val() == "Coupon"){
                $("#af1").show();
                $("#af2").show();
                $("#af3").hide();
                $("#af4").hide();
            }
            else {
                $("#af1").show();
                $("#af2").show();
                $("#af3").show();
                $("#af4").show();
            }
        }
        else{

        }

    });
    $("#apb_appassbundle_mbackfields_couponBackFieldTotalFields").change(function(){

        if($(this).val() == 0) {

            $("#bf1").hide();
            $("#bf2").hide();
            $("#bf3").hide();
            $("#bf4").hide();
            $("#bf5").hide();
            $("#bf6").hide();
            $("#bf7").hide();
            $("#bf8").hide();
            $("#bf9").hide();
            $("#bf10").hide();
        }
        else if($(this).val() == 1){

            $("#bf1").show();
            $("#bf2").hide();
            $("#bf3").hide();
            $("#bf4").hide();
            $("#bf5").hide();
            $("#bf6").hide();
            $("#bf7").hide();
            $("#bf8").hide();
            $("#bf9").hide();
            $("#bf10").hide();
        }
        else if($(this).val() == 2){

            $("#bf1").show();
            $("#bf2").show();
            $("#bf3").hide();
            $("#bf4").hide();
            $("#bf5").hide();
            $("#bf6").hide();
            $("#bf7").hide();
            $("#bf8").hide();
            $("#bf9").hide();
            $("#bf10").hide();
        }
        else if($(this).val() == 3){

            $("#bf1").show();
            $("#bf2").show();
            $("#bf3").show();
            $("#bf4").hide();
            $("#bf5").hide();
            $("#bf6").hide();
            $("#bf7").hide();
            $("#bf8").hide();
            $("#bf9").hide();
            $("#bf10").hide();
        }
        else if($(this).val() == 4){

            $("#bf1").show();
            $("#bf2").show();
            $("#bf3").show();
            $("#bf4").show();
            $("#bf5").hide();
            $("#bf6").hide();
            $("#bf7").hide();
            $("#bf8").hide();
            $("#bf9").hide();
            $("#bf10").hide();
        }
        else if($(this).val() == 5){

            $("#bf1").show();
            $("#bf2").show();
            $("#bf3").show();
            $("#bf4").show();
            $("#bf5").show();
            $("#bf6").hide();
            $("#bf7").hide();
            $("#bf8").hide();
            $("#bf9").hide();
            $("#bf10").hide();
        }
        else if($(this).val() == 6){

            $("#bf1").show();
            $("#bf2").show();
            $("#bf3").show();
            $("#bf4").show();
            $("#bf5").show();
            $("#bf6").show();
            $("#bf7").hide();
            $("#bf8").hide();
            $("#bf9").hide();
            $("#bf10").hide();
        }
        else if($(this).val() == 7){

            $("#bf1").show();
            $("#bf2").show();
            $("#bf3").show();
            $("#bf4").show();
            $("#bf5").show();
            $("#bf6").show();
            $("#bf7").show();
            $("#bf8").hide();
            $("#bf9").hide();
            $("#bf10").hide();
        }
        else if($(this).val() == 8){

            $("#bf1").show();
            $("#bf2").show();
            $("#bf3").show();
            $("#bf4").show();
            $("#bf5").show();
            $("#bf6").show();
            $("#bf7").show();
            $("#bf8").show();
            $("#bf9").hide();
            $("#bf10").hide();
        }
        else if($(this).val() == 9){

            $("#bf1").show();
            $("#bf2").show();
            $("#bf3").show();
            $("#bf4").show();
            $("#bf5").show();
            $("#bf6").show();
            $("#bf7").show();
            $("#bf8").show();
            $("#bf9").show();
            $("#bf10").hide();
        }
        else if($(this).val() == 10){

            $("#bf1").show();
            $("#bf2").show();
            $("#bf3").show();
            $("#bf4").show();
            $("#bf5").show();
            $("#bf6").show();
            $("#bf7").show();
            $("#bf8").show();
            $("#bf9").show();
            $("#bf10").show();
        }
        else{

        }

    });
    $("#apb_appassbundle_mauxiliary_couponAuxiliaryFieldValueTypeOne").change(function(){

        if($(this).val() == "text") {

            $("#af11").show();
            $("#af12").hide();
            $("#af13").hide();
            $("#af14").hide();

        }
        else if($(this).val() == "datentime"){

            $("#af11").hide();
            $("#af12").show();
            $("#af13").hide();
            $("#af14").hide();
        }
        else if($(this).val() == "number"){

            $("#af11").hide();
            $("#af12").hide();
            $("#af13").show();
            $("#af14").hide();

        }
        else if($(this).val() == "currency"){

            $("#af11").hide();
            $("#af12").hide();
            $("#af13").hide();
            $("#af14").show();

        }
        else{

        }


    });
    $("#apb_appassbundle_mauxiliary_couponAuxiliaryFieldValueTypeTwo").change(function(){

        if($(this).val() == "text") {

            $("#af21").show();
            $("#af22").hide();
            $("#af23").hide();
            $("#af24").hide();

        }
        else if($(this).val() == "datentime"){

            $("#af21").hide();
            $("#af22").show();
            $("#af23").hide();
            $("#af24").hide();
        }
        else if($(this).val() == "number"){

            $("#af21").hide();
            $("#af22").hide();
            $("#af23").show();
            $("#af24").hide();

        }
        else if($(this).val() == "currency"){

            $("#af21").hide();
            $("#af22").hide();
            $("#af23").hide();
            $("#af24").show();

        }
        else{

        }

    });
    $("#apb_appassbundle_mauxiliary_couponAuxiliaryFieldValueTypeThree").change(function(){

        if($(this).val() == "text") {

            $("#af31").show();
            $("#af32").hide();
            $("#af33").hide();
            $("#af34").hide();

        }
        else if($(this).val() == "datentime"){

            $("#af31").hide();
            $("#af32").show();
            $("#af33").hide();
            $("#af34").hide();
        }
        else if($(this).val() == "number"){

            $("#af31").hide();
            $("#af32").hide();
            $("#af33").show();
            $("#af34").hide();

        }
        else if($(this).val() == "currency"){

            $("#af31").hide();
            $("#af32").hide();
            $("#af33").hide();
            $("#af34").show();

        }
        else{

        }

    });
    $("#apb_appassbundle_mauxiliary_couponAuxiliaryFieldValueTypeFour").change(function(){

        if($(this).val() == "text") {

            $("#af41").show();
            $("#af42").hide();
            $("#af43").hide();
            $("#af44").hide();

        }
        else if($(this).val() == "datentime"){

            $("#af41").hide();
            $("#af42").show();
            $("#af43").hide();
            $("#af44").hide();
        }
        else if($(this).val() == "number"){

            $("#af41").hide();
            $("#af42").hide();
            $("#af43").show();
            $("#af44").hide();

        }
        else if($(this).val() == "currency"){

            $("#af41").hide();
            $("#af42").hide();
            $("#af43").hide();
            $("#af44").show();

        }
        else{

        }


    });
    $("#apb_appassbundle_msecondary_couponSecondaryFieldValueTypeOne").change(function(){

        if($(this).val() == "text") {

            $("#sf11").show();
            $("#sf12").hide();
            $("#sf13").hide();
            $("#sf14").hide();

        }
        else if($(this).val() == "datentime"){

            $("#sf11").hide();
            $("#sf12").show();
            $("#sf13").hide();
            $("#sf14").hide();
        }
        else if($(this).val() == "number"){

            $("#sf11").hide();
            $("#sf12").hide();
            $("#sf13").show();
            $("#sf14").hide();

        }
        else if($(this).val() == "currency"){

            $("#sf11").hide();
            $("#sf12").hide();
            $("#sf13").hide();
            $("#sf14").show();

        }
        else{

        }

    });
    $("#apb_appassbundle_msecondary_couponSecondaryFieldValueTypeTwo").change(function(){

        if($(this).val() == "text") {

            $("#sf21").show();
            $("#sf22").hide();
            $("#sf23").hide();
            $("#sf24").hide();

        }
        else if($(this).val() == "datentime"){

            $("#sf21").hide();
            $("#sf22").show();
            $("#sf23").hide();
            $("#sf24").hide();
        }
        else if($(this).val() == "number"){

            $("#sf21").hide();
            $("#sf22").hide();
            $("#sf23").show();
            $("#sf24").hide();

        }
        else if($(this).val() == "currency"){

            $("#sf21").hide();
            $("#sf22").hide();
            $("#sf23").hide();
            $("#sf24").show();

        }
        else{

        }


    });
    $("#apb_appassbundle_msecondary_couponSecondaryFieldValueTypeThree").change(function(){

        if($(this).val() == "text") {

            $("#sf31").show();
            $("#sf32").hide();
            $("#sf33").hide();
            $("#sf34").hide();

        }
        else if($(this).val() == "datentime"){

            $("#sf31").hide();
            $("#sf32").show();
            $("#sf33").hide();
            $("#sf34").hide();
        }
        else if($(this).val() == "number"){

            $("#sf31").hide();
            $("#sf32").hide();
            $("#sf33").show();
            $("#sf34").hide();

        }
        else if($(this).val() == "currency"){

            $("#sf31").hide();
            $("#sf32").hide();
            $("#sf33").hide();
            $("#sf34").show();

        }
        else{

        }

    });
    $("#apb_appassbundle_msecondary_couponSecondaryFieldValueTypeFour").change(function(){

        if($(this).val() == "text") {

            $("#sf41").show();
            $("#sf42").hide();
            $("#sf43").hide();
            $("#sf44").hide();

        }
        else if($(this).val() == "datentime"){

            $("#sf41").hide();
            $("#sf42").show();
            $("#sf43").hide();
            $("#sf44").hide();
        }
        else if($(this).val() == "number"){

            $("#sf41").hide();
            $("#sf42").hide();
            $("#sf43").show();
            $("#sf44").hide();

        }
        else if($(this).val() == "currency"){

            $("#sf41").hide();
            $("#sf42").hide();
            $("#sf43").hide();
            $("#sf44").show();

        }
        else{

        }

    });
    $("#apb_appassbundle_mprimary_couponPrimaryFieldValueType").change(function(){

        if($(this).val() == "text") {

            $("#primary1").show();
            $("#primary2").hide();
            $("#primary3").hide();
            $("#primary4").hide();
        }
        else if($(this).val() == "datentime"){


            $("#primary1").hide();
            $("#primary2").show();
            $("#primary3").hide();
            $("#primary4").hide();
        }
        else if($(this).val() == "number"){

            $("#primary1").hide();
            $("#primary2").hide();
            $("#primary3").show();
            $("#primary4").hide();
        }
        else if($(this).val() == "currency"){

            $("#primary1").hide();
            $("#primary2").hide();
            $("#primary3").hide();
            $("#primary4").show();

        }
        else{

        }

    });

    $("#apb_appassbundle_mheader_couponHeaderValueType").change(function(){

        if($(this).val() == "text")
        {

            $("#header1").show();
            $("#header2").hide();
            $("#header3").hide();
            $("#header4").hide();

        }
        else if($(this).val() == "datentime")
        {

            $("#header1").hide();
            $("#header2").show();
            $("#header3").hide();
            $("#header4").hide();
        }
        else if($(this).val() == "number"){

            $("#header1").hide();
            $("#header2").hide();
            $("#header3").show();
            $("#header4").hide();
        }
        else if($(this).val() == "currency"){

            $("#header1").hide();
            $("#header2").hide();
            $("#header3").hide();
            $("#header4").show();
        }
        else{

        }

    });
    $("#apb_appassbundle_mdatasetting_couponBarcodeType").change(function() {
        if ($("#apb_appassbundle_mgeneral_categoryName").val() == "Generic"){
            if($(this).val() == 'PDF417'){
                $("#af").show();
                $("#haf").hide();
            }
            else{
                $("#af").hide();
                $("#haf").show();
            }

        }
        else{
            $("#af").show();
            $("#haf").hide();
        }
    });
    $("#apb_appassbundle_mdatasetting_couponBarcodeValueOption").change(function(){

        if($(this).val() == "Static") {
            $("#apb_appassbundle_mdatasetting_couponBarcodeFixedValue").show();
            $('label[for=apb_appassbundle_mdatasetting_couponBarcodeFixedValue]').show();
            $("#apb_appassbundle_mdatasetting_couponBarcodeValueSource").hide();
            $('label[for=apb_appassbundle_mdatasetting_couponBarcodeValueSource]').hide();
            $("#apb_appassbundle_mdatasetting_couponAutoGenerateValueType").hide();
            $('label[for=apb_appassbundle_mdatasetting_couponAutoGenerateValueType]').hide();
            $("#apb_appassbundle_mdatasetting_couponAutoGenerateValueLength").hide();
            $("#apb_appassbundle_mdatasetting_couponBarcodeDynamicValue").hide();
            $('label[for=apb_appassbundle_mdatasetting_couponBarcodeDynamicValue]').hide();

        }

        else{

            $("#apb_appassbundle_mdatasetting_couponBarcodeFixedValue").hide();
            $('label[for=apb_appassbundle_mdatasetting_couponBarcodeFixedValue]').hide();
            $("#apb_appassbundle_mdatasetting_couponBarcodeValueSource").show();
            $('label[for=apb_appassbundle_mdatasetting_couponBarcodeValueSource]').show();
            $("#apb_appassbundle_mdatasetting_couponAutoGenerateValueType").show();
            $('label[for=apb_appassbundle_mdatasetting_couponAutoGenerateValueType]').show();
            $("#apb_appassbundle_mdatasetting_couponAutoGenerateValueLength").show();
            //$("#apb_appassbundle_mdatasetting_couponBarcodeDynamicValue").show();
            //$('label[for=apb_appassbundle_mdatasetting_couponBarcodeDynamicValue]').show();

        }

    });
    $("#apb_appassbundle_mdatasetting_couponBarcodeValueSource").change(function(){

        if($(this).val() == "autogen") {
            $("#apb_appassbundle_mdatasetting_couponAutoGenerateValueType").show();
            $('label[for=apb_appassbundle_mdatasetting_couponAutoGenerateValueType]').show();
            $("#apb_appassbundle_mdatasetting_couponAutoGenerateValueLength").show();
            $("#apb_appassbundle_mdatasetting_couponBarcodeDynamicValue").hide();
            $('label[for=apb_appassbundle_mdatasetting_couponBarcodeDynamicValue]').hide();

        }

        else{
            $("#apb_appassbundle_mdatasetting_couponBarcodeDynamicValue").show();
            $('label[for=apb_appassbundle_mdatasetting_couponBarcodeDynamicValue]').show();
            $("#apb_appassbundle_mdatasetting_couponAutoGenerateValueType").hide();
            $('label[for=apb_appassbundle_mdatasetting_couponAutoGenerateValueType]').hide();
            $("#apb_appassbundle_mdatasetting_couponAutoGenerateValueLength").hide();

        }

    });
    $("#apb_appassbundle_mdatasetting_barcodeAlternateText").change(function(){

        if($(this).val() == "static") {
            $("#apb_appassbundle_mdatasetting_barcodeAlternateFixedText").show();
            $('label[for=apb_appassbundle_mdatasetting_barcodeAlternateFixedText]').show();
            $("#apb_appassbundle_mdatasetting_barcodeAlternateDynamicText").hide();
            $('label[for=apb_appassbundle_mdatasetting_barcodeAlternateDynamicText]').hide();

        }

        else if($(this).val() == "dynamic") {
            $("#apb_appassbundle_mdatasetting_barcodeAlternateFixedText").hide();
            $('label[for=apb_appassbundle_mdatasetting_barcodeAlternateFixedText]').hide();
            $("#apb_appassbundle_mdatasetting_barcodeAlternateDynamicText").show();
            $('label[for=apb_appassbundle_mdatasetting_barcodeAlternateDynamicText]').show();

        }
        else {
            $("#apb_appassbundle_mdatasetting_barcodeAlternateFixedText").hide();
            $('label[for=apb_appassbundle_mdatasetting_barcodeAlternateFixedText]').hide();
            $("#apb_appassbundle_mdatasetting_barcodeAlternateDynamicText").hide();
            $('label[for=apb_appassbundle_mdatasetting_barcodeAlternateDynamicText]').hide();
        }

    });
    $("#apb_appassbundle_mdatasetting_couponBarcodeStatus").change(function(){

        if($(this).val() == "show") {
            $('#br').show();
        }

        else{
            $('#br').hide();
        }
    });
    $("#apb_appassbundle_mappearance_eventTicketStatus").change(function() {
        if($(this).val() == 'Layout 1: Strip'){
            $("#apb_appassbundle_mappearance_eventTicketStrip").show();
            $('label[for=apb_appassbundle_mappearance_eventTicketStrip]').show();
            $("#apb_appassbundle_mappearance_eventTicketThumbnail").hide();
            $('label[for=apb_appassbundle_mappearance_eventTicketThumbnail]').hide();
            $("#apb_appassbundle_mappearance_eventTicketBackground").hide();
            $('label[for=apb_appassbundle_mappearance_eventTicketBackground]').hide();
        }
        else if($(this).val() == 'Layout 2: Background/Thumbnail'){
            $("#apb_appassbundle_mappearance_eventTicketThumbnail").show();
            $('label[for=apb_appassbundle_mappearance_eventTicketThumbnail]').show();
            $("#apb_appassbundle_mappearance_eventTicketBackground").show();
            $('label[for=apb_appassbundle_mappearance_eventTicketBackground]').show();
            $("#apb_appassbundle_mappearance_eventTicketStrip").hide();
            $('label[for=apb_appassbundle_mappearance_eventTicketStrip]').hide();
        }
        else{
            $("#apb_appassbundle_mappearance_eventTicketThumbnail").show();
            $('label[for=apb_appassbundle_mappearance_eventTicketThumbnail]').show();
            $("#apb_appassbundle_mappearance_eventTicketBackground").show();
            $('label[for=apb_appassbundle_mappearance_eventTicketBackground]').show();
            $("#apb_appassbundle_mappearance_eventTicketStrip").hide();
            $('label[for=apb_appassbundle_mappearance_eventTicketStrip]').hide();
        }
    });

    $("#apb_appassbundle_mgeneral_categoryName").change(function() {
        if ($(this).val() == "Generic"){
            if($("#apb_appassbundle_mdatasetting_couponBarcodeType").val() == 'PDF417'){
                $("#af").show();
                $("#haf").hide();
            }
            else{
                $("#af").hide();
                $("#haf").show();
            }

        }
        else{
            $("#af").show();
            $("#haf").hide();
        }

        if ($(this).val() == "Coupon") {
            if($("#apb_appassbundle_msecondary_couponSecondaryFieldTotalFields").val() == 3 || $("#apb_appassbundle_msecondary_couponSecondaryFieldTotalFields").val() == 4){
                $("#sf1").show();
                $("#sf2").show();
                $("#sf3").hide();
                $("#sf4").hide();
            }
            if($("#apb_appassbundle_mauxiliary_couponAuxiliaryFieldTotalFields").val() == 3 || $("#apb_appassbundle_mauxiliary_couponAuxiliaryFieldTotalFields").val() == 4){
                $("#af1").show();
                $("#af2").show();
                $("#af3").hide();
                $("#af4").hide();
            }
        }

        else{
            if($("#apb_appassbundle_mauxiliary_couponAuxiliaryFieldTotalFields").val() == 0) {
                $("#af1").hide();
                $("#af2").hide();
                $("#af3").hide();
                $("#af4").hide();
            }
            else if($("#apb_appassbundle_mauxiliary_couponAuxiliaryFieldTotalFields").val() == 1){
                $("#af1").show();
                $("#af2").hide();
                $("#af3").hide();
                $("#af4").hide();
            }
            else if($("#apb_appassbundle_mauxiliary_couponAuxiliaryFieldTotalFields").val() == 2){
                $("#af1").show();
                $("#af2").show();
                $("#af3").hide();
                $("#af4").hide();
            }
            else if($("#apb_appassbundle_mauxiliary_couponAuxiliaryFieldTotalFields").val() == 3){
                $("#af1").show();
                $("#af2").show();
                $("#af3").show();
                $("#af4").hide();
            }
            else if($("#apb_appassbundle_mauxiliary_couponAuxiliaryFieldTotalFields").val() == 4){
                $("#af1").show();
                $("#af2").show();
                $("#af3").show();
                $("#af4").show();
            }
            else{
                //
            }

            if($("#apb_appassbundle_msecondary_couponSecondaryFieldTotalFields").val() == 0) {
                $("#sf1").hide();
                $("#sf2").hide();
                $("#sf3").hide();
                $("#sf4").hide();
            }
            else if($("#apb_appassbundle_msecondary_couponSecondaryFieldTotalFields").val() == 1){
                $("#sf1").show();
                $("#sf2").hide();
                $("#sf3").hide();
                $("#sf4").hide();
            }
            else if($("#apb_appassbundle_msecondary_couponSecondaryFieldTotalFields").val() == 2){
                $("#sf1").show();
                $("#sf2").show();
                $("#sf3").hide();
                $("#sf4").hide();
            }
            else if($("#apb_appassbundle_msecondary_couponSecondaryFieldTotalFields").val() == 3){
                $("#sf1").show();
                $("#sf2").show();
                $("#sf3").show();
                $("#sf4").hide();
            }
            else if($("#apb_appassbundle_msecondary_couponSecondaryFieldTotalFields").val() == 4){
                $("#sf1").show();
                $("#sf2").show();
                $("#sf3").show();
                $("#sf4").show();
            }
            else{
            }
        }
        // foo is the id of the other select box
        if ($(this).val() == "Boarding Pass") {
            $("#apb_appassbundle_mgeneral_boardingPassTransit").show();
            $('label[for=apb_appassbundle_mgeneral_boardingPassTransit]').show();
            $("#apb_appassbundle_mappearance_boardingPassFooter").show();
            $('label[for=apb_appassbundle_mappearance_boardingPassFooter]').show();
            $("#apb_appassbundle_mappearance_genericThumbnail").hide();
            $('label[for=apb_appassbundle_mappearance_genericThumbnail]').hide();
            $("#apb_appassbundle_mappearance_couponStrip").hide();
            $('label[for=apb_appassbundle_mappearance_couponStrip]').hide();
            $("#apb_appassbundle_mappearance_storeCardStrip").hide();
            $('label[for=apb_appassbundle_mappearance_storeCardStrip]').hide();
            $("#apb_appassbundle_mappearance_eventTicketStatus").hide();
            $('label[for=apb_appassbundle_mappearance_eventTicketStatus]').hide();
            $("#apb_appassbundle_mappearance_eventTicketStrip").hide();
            $('label[for=apb_appassbundle_mappearance_eventTicketStrip]').hide();
            $("#apb_appassbundle_mappearance_eventTicketThumbnail").hide();
            $('label[for=apb_appassbundle_mappearance_eventTicketThumbnail]').hide();
            $("#apb_appassbundle_mappearance_eventTicketBackground").hide();
            $('label[for=apb_appassbundle_mappearance_eventTicketBackground]').hide();
            $("#apb_appassbundle_mgeneral_places").hide();
            $('label[for=apb_appassbundle_mgeneral_places]').hide();

            $("#af").show();
            $("#haf").hide();

        }
        else if ($(this).val() == "Generic") {
            $("#apb_appassbundle_mappearance_genericThumbnail").show();
            $('label[for=apb_appassbundle_mappearance_genericThumbnail]').show();
            $("#apb_appassbundle_mgeneral_boardingPassTransit").hide();
            $('label[for=apb_appassbundle_mgeneral_boardingPassTransit]').hide();
            $("#apb_appassbundle_mappearance_boardingPassFooter").hide();
            $('label[for=apb_appassbundle_mappearance_boardingPassFooter]').hide();
            $("#apb_appassbundle_mappearance_couponStrip").hide();
            $('label[for=apb_appassbundle_mappearance_couponStrip]').hide();
            $("#apb_appassbundle_mappearance_storeCardStrip").hide();
            $('label[for=apb_appassbundle_mappearance_storeCardStrip]').hide();
            $("#apb_appassbundle_mappearance_eventTicketStatus").hide();
            $('label[for=apb_appassbundle_mappearance_eventTicketStatus]').hide();
            $("#apb_appassbundle_mappearance_eventTicketStrip").hide();
            $('label[for=apb_appassbundle_mappearance_eventTicketStrip]').hide();
            $("#apb_appassbundle_mappearance_eventTicketThumbnail").hide();
            $('label[for=apb_appassbundle_mappearance_eventTicketThumbnail]').hide();
            $("#apb_appassbundle_mappearance_eventTicketBackground").hide();
            $('label[for=apb_appassbundle_mappearance_eventTicketBackground]').hide();
            $("#apb_appassbundle_mgeneral_places").hide();
            $('label[for=apb_appassbundle_mgeneral_places]').hide();

        }
        else if ($(this).val() == "Coupon") {
            $("#apb_appassbundle_mappearance_couponStrip").show();
            $('label[for=apb_appassbundle_mappearance_couponStrip]').show();
            $("#apb_appassbundle_mappearance_genericThumbnail").hide();
            $('label[for=apb_appassbundle_mappearance_genericThumbnail]').hide();
            $("#apb_appassbundle_mgeneral_boardingPassTransit").hide();
            $('label[for=apb_appassbundle_mgeneral_boardingPassTransit]').hide();
            $("#apb_appassbundle_mappearance_boardingPassFooter").hide();
            $('label[for=apb_appassbundle_mappearance_boardingPassFooter]').hide();
            $("#apb_appassbundle_mappearance_storeCardStrip").hide();
            $('label[for=apb_appassbundle_mappearance_storeCardStrip]').hide();
            $("#apb_appassbundle_mappearance_eventTicketStatus").hide();
            $('label[for=apb_appassbundle_mappearance_eventTicketStatus]').hide();
            $("#apb_appassbundle_mappearance_eventTicketStrip").hide();
            $('label[for=apb_appassbundle_mappearance_eventTicketStrip]').hide();
            $("#apb_appassbundle_mappearance_eventTicketThumbnail").hide();
            $('label[for=apb_appassbundle_mappearance_eventTicketThumbnail]').hide();
            $("#apb_appassbundle_mappearance_eventTicketBackground").hide();
            $('label[for=apb_appassbundle_mappearance_eventTicketBackground]').hide();
            $("#apb_appassbundle_mgeneral_places").show();
            $('label[for=apb_appassbundle_mgeneral_places]').show();
            $("#af").show();
            $("#haf").hide();
        }
        else if ($(this).val() == "Event Ticket") {
            $("#apb_appassbundle_mappearance_eventTicketStatus").show();
            $('label[for=apb_appassbundle_mappearance_eventTicketStatus]').show();
            $("#apb_appassbundle_mappearance_eventTicketStrip").show();
            $('label[for=apb_appassbundle_mappearance_eventTicketStrip]').show();
            $("#apb_appassbundle_mappearance_eventTicketThumbnail").hide();
            $('label[for=apb_appassbundle_mappearance_eventTicketThumbnail]').hide();
            $("#apb_appassbundle_mappearance_eventTicketBackground").hide();
            $('label[for=apb_appassbundle_mappearance_eventTicketBackground]').hide();

            $("#apb_appassbundle_mappearance_genericThumbnail").hide();
            $('label[for=apb_appassbundle_mappearance_genericThumbnail]').hide()
            $("#apb_appassbundle_mgeneral_boardingPassTransit").hide();
            $('label[for=apb_appassbundle_mgeneral_boardingPassTransit]').hide();
            $("#apb_appassbundle_mappearance_boardingPassFooter").hide();
            $('label[for=apb_appassbundle_mappearance_boardingPassFooter]').hide();
            $("#apb_appassbundle_mappearance_couponStrip").hide();
            $('label[for=apb_appassbundle_mappearance_couponStrip]').hide();
            $("#apb_appassbundle_mappearance_storeCardStrip").hide();
            $('label[for=apb_appassbundle_mappearance_storeCardStrip]').hide();
            $("#apb_appassbundle_mgeneral_places").hide();
            $('label[for=apb_appassbundle_mgeneral_places]').hide();
            $("#af").show();
            $("#haf").hide();
        }
        else if ($(this).val() == "Store Card") {
            $("#apb_appassbundle_mappearance_storeCardStrip").show();
            $('label[for=apb_appassbundle_mappearance_storeCardStrip]').show();

            $("#apb_appassbundle_mappearance_genericThumbnail").hide();
            $('label[for=apb_appassbundle_mappearance_genericThumbnail]').hide();
            $("#apb_appassbundle_mgeneral_boardingPassTransit").hide();
            $('label[for=apb_appassbundle_mgeneral_boardingPassTransit]').hide();
            $("#apb_appassbundle_mappearance_boardingPassFooter").hide();
            $('label[for=apb_appassbundle_mappearance_boardingPassFooter]').hide();
            $("#apb_appassbundle_mappearance_couponStrip").hide();
            $('label[for=apb_appassbundle_mappearance_couponStrip]').hide();
            $("#apb_appassbundle_mappearance_eventTicketStatus").hide();
            $('label[for=apb_appassbundle_mappearance_eventTicketStatus]').hide();
            $("#apb_appassbundle_mappearance_eventTicketStrip").hide();
            $('label[for=apb_appassbundle_mappearance_eventTicketStrip]').hide();
            $("#apb_appassbundle_mappearance_eventTicketThumbnail").hide();
            $('label[for=apb_appassbundle_mappearance_eventTicketThumbnail]').hide();
            $("#apb_appassbundle_mappearance_eventTicketBackground").hide();
            $('label[for=apb_appassbundle_mappearance_eventTicketBackground]').hide();
            $("#apb_appassbundle_mgeneral_places").hide();
            $('label[for=apb_appassbundle_mgeneral_places]').hide();
            $("#af").show();
            $("#haf").hide();
        }
        else{ //
        }
    });
});
