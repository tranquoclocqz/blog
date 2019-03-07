$(document).ready(function () {
	$('#sidebarCollapse').on('click', function () {
		$('#sidebar').toggleClass('active');
	});
	$(".checkall").change(function(event) {
		var table = $(this).parents('table'), array_id = [];
		if ($(this).is(":checked")) {
			table.find("input.icheck").each(function(index, el) {
				$(this).prop('checked','checked');
				array_id.push($(this).val());
			});
		} else {
			table.find("input.icheck").prop('checked','');
			array_id = [];
		}
		$("#idChecked").val(array_id);
	});
	$("input.icheck").change(function(event) {
		var array = new Array($("#idChecked").val().split(',')), length = array.length;
		if ($(this).is(":checked")) {
			array.push($(this).val());
		} else {
			for (i = 0; i < length; i ++) {
				if (array[i] == $(this).val()) {
					array.splice(i, 1); 
					break;
				}
			}
		}
		$("#idChecked").val(array);
		console.log(array);
	});
	var flag = 0;
	$("#customSlug").change(function(event) {
		if ($("#customSlug").is(":checked")) {
			$('#slug').removeAttr('readonly');
			flag = 1;
		} else {
			flag = 0;
			$('#slug').attr('readonly', true);
		}
	});
	$("#title").keyup(function(event) {
		if (flag == 1) {

		} else {
			$('#slug').val(ChangeToSlug($(this).val()));
		}
	});	
	function ChangeToSlug(str) {
		slug = str.toLowerCase();
		slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
		slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
		slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
		slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
		slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
		slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
		slug = slug.replace(/đ/gi, 'd');
		slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
		slug = slug.replace(/ /gi, "-");
		slug = slug.replace(/\-\-\-\-\-/gi, '-');
		slug = slug.replace(/\-\-\-\-/gi, '-');
		slug = slug.replace(/\-\-\-/gi, '-');
		slug = slug.replace(/\-\-/gi, '-');
		slug = '@' + slug + '@';
		slug = slug.replace(/\@\-|\-\@|\@/gi, '');
		return slug;
	}
});	
