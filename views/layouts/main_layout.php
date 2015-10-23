<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<title>Thực Tập hanoisoft</title>
	<?php 
		$css_path = '/thuctap/public/jqwidgets/styles/jqx.base.css';
		$jquery_path = '/thuctap/public/scripts/jquery-2.0.2.min.js';
		$jqwiget_core_path = '/thuctap/public/jqwidgets/jqxcore.js';
        $jqwiget_data_path = '/thuctap/public/jqwidgets/jqxdata.js';
		$jqwiget_docpanel_path = '/thuctap/public/jqwidgets/jqxdockpanel.js';
        $jqwiget_scollbar_path = '/thuctap/public/jqwidgets/jqxscrollbar.js';
        $jqwiget_listbox_path = '/thuctap/public/jqwidgets/jqxlistbox.js';
        $jqwiget_combobox_path= '/thuctap/public/jqwidgets/jqxcombobox.js';
        $jqwiget_button_path = '/thuctap/public/jqwidgets/jqxbuttons.js';
        $jqwiget_table_path = '/thuctap/public/jqwidgets/jqxdatatable.js';
       // $qwiget_button_path = '/thuctap/public/jqwidgets/jqxbuttons.js'; -->
    ?>
    <style tye="text/css">
        #container{
            width: 1000px;
            height: auto;
            margin-left: auto;
            margin-right: auto;
        }
        #navibox{
            display: block;
            padding-bottom: 10px;
            padding-top: 10px;
        }
        .boxwraper{
            width: 300px;
            display: inline-block;
        }
        .cbboxlabel{
            display: inline-block;
            padding-right: 5px;
            vertical-align: top;
            line-height: 25px;
        }
        .cbbox{
            display: inline-block;
        }
        #titlebox{
            text-align: center;
        }
        #actionbox{
            padding-top: 4px;
        }
        .formgroup{
            display: inline-table;
            margin-right: 30px;
        }
        .label{
            width:  150px;
            display: inline-table;
        }
        .action-input{
            width: 200px;
            height: 25px;
            padding-left: 3px;
        }
        .buttunbox{
            padding-bottom: 4px;
        }
        .formrow{
            margin-bottom: 2px;
        }
    </style>
    <link rel="stylesheet" href="<?php echo $css_path; ?>" type="text/css" />
    <link rel="stylesheet" href="/thuctap/public/jqwidgets/styles/jqx.energyblue.css" type="text/css" />
    <script type="text/javascript" src="<?php echo $jquery_path; ?>"></script>
    <script type="text/javascript" src="<?php echo $jqwiget_core_path; ?>"></script>
    <script type="text/javascript" src="<?php echo $jqwiget_docpanel_path; ?>"></script>
    <script type="text/javascript" src="<?php echo $jqwiget_data_path; ?>"></script>
    <script type="text/javascript" src="<?php echo $jqwiget_scollbar_path; ?>"></script>
    <script type="text/javascript" src="<?php echo $jqwiget_combobox_path; ?>"></script>
    <script type="text/javascript" src="<?php echo $jqwiget_listbox_path; ?>"></script>
    <script type="text/javascript" src="<?php echo $jqwiget_button_path; ?>"></script>
    <script type="text/javascript" src="<?php echo $jqwiget_table_path; ?>"></script>
    <script type="text/javascript" src="<?php echo $jqwiget_button_path; ?>"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        var url = "./?action=gettinhthanh";
            // prepare the data
        var ttsource =
        {
            datatype: "json",
            datafields: [
                { name: 'code' },
                { name: 'stt' },
                { name: 'ma' },
                { name: 'ten' },
                { name: 'kieu' }
                ],
            sortcolumn: 'ten',
            sortdirection: 'asc',    
            id: 'code',
            url: url
        };

        var tinhThanhAdapter = new $.jqx.dataAdapter(ttsource);
        $("#boxtinhthanh").jqxComboBox(
        {
            width: 200,
            height: 25,
            dropDownWidth: 200,
            dropDownHeight: 400,
            disabled: false,
            theme:'energyblue',
            source: tinhThanhAdapter,
            promptText: "chọn tỉnh thành...",
            displayMember: 'ten',
            valueMember: 'code'
        });

        var qhsource =
        {
            datatype: "json",
            datafields: [
                { name: 'code' },
                {name: 'dm_tinhthanhCode'},
                { name: 'stt' },
                { name: 'ma' },
                { name: 'ten' },
                { name: 'kieu' }
                ],
            sortcolumn: 'ten',
            sortdirection: 'asc',
            id: 'code',
            url: './?action=getquanhuyen&ttcode=0'
        };

        $("#boxquanhuyen").jqxComboBox(
        {
            width: 200,
            height: 25,
            dropDownWidth: 200,
            dropDownHeight: 400,
            disabled: true,
            theme:'energyblue',
            promptText: "chọn quận huyện...",
            displayMember: 'ten',
            valueMember: 'code'
        });

        var xpsource =
        {
            datatype: "json",
            datafields: [
                { name: 'code' },
                {name: 'dm_quanhuyenCode'},
                { name: 'stt' },
                { name: 'ma' },
                { name: 'ten' },
                { name: 'kieu' }
                ],
            sortcolumn: 'ten',
            sortdirection: 'asc',    
            id: 'code',
            url: './?action=xaphuong&qhcode=0'
        };

        $("#boxxaphuong").jqxComboBox(
        {
            width: 200,
            height: 25,
            dropDownWidth: 200,
            dropDownHeight: 400,
            disabled: true,
            theme:'energyblue',
            promptText: "chọn xã phường...",
            displayMember: 'ten',
            valueMember: 'code'
        });

         var dvsource =
            {
                url: './?action=getdonvi&xpcode=1',
                datatype: "json",
                sortcolumn: 'stt',
                sortdirection: 'asc',
                dataFields:
                [
                    { name: 'code', type: 'number'},
                    { name: 'dm_xaphuongCode', type: 'number' },
                    { name: 'stt', type: 'number' },
                    { name: 'ma', type: 'string' },
                    { name: 'tendonvi', type: 'string' },
                    { name: 'sdt', type: 'string' },
                    { name: 'nguoidaidien', type: 'string' },
                    {name: 'ghichu', type : 'string'}
                ]                     
            };

            // initialize jqxDataTable
            $("#table").jqxDataTable(
            {   width: 1000,
                height: 400,              
                altRows: false,
                sortable: true,
                selectionMode: 'singleRow',
                theme: 'energyblue',
                showStatusbar: true,
                exportSettings: { fileName: null },
                columns: [
                  { text: 'STT', dataField: 'stt', width: 60, align: 'center' },
                  { text: 'Mã', dataField: 'ma', width: 90, align: 'center' },
                  { text: 'Tên Dơn Vị', dataField: 'tendonvi', width: 300, align: 'center'},
                  { text: 'Số Điện Thoại', dataField: 'sdt', width: 170, align: 'center' },
                  { text: 'Người Đại Diện', dataField: 'nguoidaidien', width: 180, align: 'center'},
                  { text: 'Ghi Chú', dataField: 'ghichu', width: 200, align: 'center' }
                ]
            });

        $('#table').on('bindingComplete', function (event) {
            $('input#code')[0].value = '';
            $('input#stt')[0].value = '';
            $('input#ma')[0].value = '';
            $('input#tendonvi')[0].value = '';
            $('input#sdt')[0].value = '';
            $('input#nguoidaidien')[0].value = '';
            $('input#ghichu')[0].value = '';
            $("a#download").hide();
        });     
        $("#boxtinhthanh").on('select', function(event){
            if (event.args) {
                $("#boxquanhuyen").jqxComboBox('clear');
                $("#boxxaphuong").jqxComboBox('clear');
                $("#boxquanhuyen").jqxComboBox({ disabled: false, selectedIndex: -1});  
                $("#table").jqxDataTable('clear');      
                var value = event.args.item.value;
                qhsource.url = ('./?action=getquanhuyen&ttcode=' + value);
                quanhuyenAdapter = new $.jqx.dataAdapter(qhsource);
                $("#boxquanhuyen").jqxComboBox({source: quanhuyenAdapter});
            }
        });

        $("#boxquanhuyen").on('select', function(event){
            if (event.args) {
                $("#boxxaphuong").jqxComboBox('clear');
                $("#boxxaphuong").jqxComboBox({ disabled: false, selectedIndex: -1});
                $("#table").jqxDataTable('clear');         
                var value = event.args.item.value;
                xpsource.url = ('./?action=getxaphuong&qhcode=' + value);
                xaphuongAdapter = new $.jqx.dataAdapter(xpsource);
                $("#boxxaphuong").jqxComboBox({source: xaphuongAdapter});
            }
        });

        $("#boxxaphuong").on('select', function(event){            
            if (event.args) {       
                $("#table").jqxDataTable('clear');
                var value = event.args.item.value;
                dvsource.url = ('./?action=getdonvi&xpcode=' + value);
                tableAdapter = new $.jqx.dataAdapter(dvsource);
                $("#table").jqxDataTable({source: tableAdapter});
                $('input#dm_xaphuongCode')[0].value = value;
            }
        });
        //button
        $('#adddonvibtn').jqxToggleButton({width: '150', height: '40'});
        $('#updetedonvibtn').jqxButton({width: '150', height: '40'});
        $('#deletedonvibtn').jqxButton({width: '150', height: '40'});
        $('#printdonvibtn').jqxButton({width: '150', height: '40'});

        $("#adddonvibtn").on('click', function () {
            if($('#boxtinhthanh').jqxComboBox('selectedIndex') == -1){
                $("#adddonvibtn").jqxToggleButton({toggled: false});
                alert("bạn chưa chọn tỉnh thành");
                return;
            } else if($('#boxquanhuyen').jqxComboBox('selectedIndex') == -1){
                $("#adddonvibtn").jqxToggleButton({toggled: false});
                alert("bạn chưa chọn quạn huyện");
                return;
            } else if($('#boxxaphuong').jqxComboBox('selectedIndex') == -1){
                $("#adddonvibtn").jqxToggleButton({toggled: false});
                alert("bạn chưa chọn xã phường");
                return;
            }

            var toggled = $("#adddonvibtn").jqxToggleButton('toggled');
            if (toggled) {
                var stt = $("#table").jqxDataTable('getRows').length + 1;

                $("#adddonvibtn")[0].value = 'Hủy Thêm Mới';
                $("#actionform")[0].action = "./?action=themdonvi";
                $("#actionform")[0].setAttribute('role', 'themmoi');
                $('input#code')[0].value = '';
                $('input#stt')[0].value = stt;
                $('input#ma')[0].value = '';
                 $('input#tendonvi')[0].value = '';
                $('input#sdt')[0].value = '';
                $('input#nguoidaidien')[0].value = '';
                $('input#ghichu')[0].value = '';
            }
            else {
                $("#adddonvibtn")[0].value = 'Thêm Mói';
                $("#actionform")[0].action = "./?action=capnhatdonvi";
                $("#actionform")[0].setAttribute('role', "capnhat");
                $('input#stt')[0].value = '';
            }
        });

        $("#updetedonvibtn").on('click', function () {
            if($("#actionform")[0].getAttribute('role') == 'capnhat' && $('#table').jqxDataTable('getSelection').length == 0){
                alert('chọn đơn vị để cập nhật!');
                return;
            }
            var request = "";
            var input = $('input.action-input');
            for(var i = 0; i < $('input.action-input').length; i++){
                var ip = $('input.action-input')[i];
                request += ip.name + "=" + ip.value  + "&";
            }
            var url = $('form#actionform')[0].action;
            $.ajax({
                url: url,
                type: 'POST',
                data: request,
                success: function(respone){
                    alert(respone);
                    var toggled = $("#adddonvibtn").jqxToggleButton('toggled');
                    if (toggled) {
                        $('#adddonvibtn').click();
                    }
                    var item = $('#boxxaphuong').jqxComboBox('getSelectedItem');
                    $('#boxxaphuong').jqxComboBox('selectItem', item);
                },
                error: function(){
                    alert("cập nhật thất bại");
                }
            });
        });

        $('#deletedonvibtn').on('click', function(){
            if($('#table').jqxDataTable('getSelection').length == 0){
                alert('chưa chọn đơn vị để xóa!');
                return;
            }
            if (!confirm('Bạn có chắc muốn xóa đơn vị này?')) return;
            var code = $('input#code')[0].value;
            var stt = $('input#stt')[0].value;
            var xp = $('input#dm_xaphuongCode')[0].value;
            var data = '&code=' + code + '&stt=' + stt + '&xp=' + xp;
            var url = './?action=xoadonvi';
            $.ajax({
                url: url,
                type: 'DELETE',
                data: data,
                success: function(respone){
                    alert(respone);
                    var item = $('#boxxaphuong').jqxComboBox('getSelectedItem');
                    $('#boxxaphuong').jqxComboBox('selectItem', item);
                },
                error: function(){
                    alert("cập nhật thất bại");
                    }
            });
        });

        $('#printdonvibtn').on('click', function(){
            if($('#table').jqxDataTable('getRows').length == 0){
                alert('danh sách trống!');
                return;
            } 
            var tt = $('#boxtinhthanh').jqxComboBox('getSelectedItem').value;
            var qh = $('#boxquanhuyen').jqxComboBox('getSelectedItem').value;
            var xp = $('#boxxaphuong').jqxComboBox('getSelectedItem').value;
            var dv = $('#table').jqxDataTable('getSelection')[0].code | '';
            var query = './?action=indanhsach&tt=' + tt + '&qh=' + qh + '&xp=' + xp + '&dv=' + dv;
            $('"a#download"').href = query;
            $("a#download").show();
        });

        $('#table').on('rowSelect', 
        function (event){
            var selection = $("#table").jqxDataTable('getSelection'); 
            var rowData = selection[0];
            $('input#code')[0].value = rowData.code;
            $('input#stt')[0].value = rowData.stt;
            $('input#ma')[0].value = rowData.ma;
            $('input#tendonvi')[0].value = rowData.tendonvi;
            $('input#sdt')[0].value = rowData.sdt;
            $('input#nguoidaidien')[0].value = rowData.nguoidaidien;
            $('input#ghichu')[0].value = rowData.ghichu;
            $("a#download").hide();
        });
    });
    
    </script>
</head>
<body class="default">
        <div id='container'>
            <div id='titlebox' dock='left'>
                <h1>DANH MỤC DƠN VỊ</h1>
            </div>
            <div id='navibox' dock='top'>
            	<div id="boxgroup">
            		<div class="boxwraper"><div class="cbboxlabel">Tỉnh Thành</div><div class="cbbox" id="boxtinhthanh"></div></div>
            		<div class="boxwraper"><div class="cbboxlabel">Quận Huyện</div><div class="cbbox" id="boxquanhuyen"></div></div>
            		<div class="boxwraper"><div class="cbboxlabel">Xã Phường</div><div class="cbbox" id="boxxaphuong"></div></div>
            	</div>
            </div>
            <div id='databox' dock='right'>
                <div id="table"></div>
            </div>
            <div id='actionbox'>
                <div class="buttunbox">
                    <input type="button" value="Thêm Mới" class="btn" id="adddonvibtn"></input>
                    <input type="button" value="cập nhật" class="btn" id="updetedonvibtn"></input>
                    <input type="button" value="xóa" class="btn" id="deletedonvibtn"></input>
                    <input type="button" value="in dữ liệu" class="btn" id="printdonvibtn"></input>
                    <a id="download" href="./?action=indanhsach&tt=1&qh=1&xp=1&dv=" style="display: none; padding-left: 2px">Tải về</a>
                </div>
                <div class="formbox">
                    <form id="actionform" method="POST" role="capnhat" action="./?action=capnhatdonvi">
                    <input type="hidden" class="action-input" value="" name="stt" id="stt" />
                    <input type="hidden" class="action-input" value="" name="code" id="code" />
                    <input type="hidden" class="action-input" value="" name="dm_xaphuongCode" id="dm_xaphuongCode" />
                    <div class="formrow">
                        <div class="formgroup">
                            <div class="label">Mã</div>
                            <input class="action-input" type="text" name="ma" id="ma" />
                        </div>
                        <div class="formgroup">
                            <div class="label">Tên đơn vị</div>
                            <input class="action-input" type="text" name="tendonvi" id="tendonvi" />
                        </div>
                    </div> 
                    <div class="formrow">   
                        <div class="formgroup">
                            <div class="label">Số điện thoại</div>
                            <input class="action-input" type="text" name="sdt" id="sdt" />
                        </div>
                        <div class="formgroup">
                            <div class="label">Người đại diện</div>
                            <input class="action-input" type="text" name="nguoidaidien" id="nguoidaidien" />
                        </div>
                     </div>
                     <div class="formrow">   
                        <div class="formgroup">
                            <div class="label">Ghi chú</div>
                            <input class="action-input" style="width: 591px;"  type="text" name="ghichu" id="ghichu" />
                        </div>
                    <div class="formrow">    
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>