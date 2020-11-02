// // event pada saat link di klik
// $('.page-scroll').on('click', function(e){

// 	// ambil isi href
// 	var tujuan = $(this).attr('href');
// 	// tangkap elemen ybs
// 	var elemenTujuan = $(tujuan);

// 	// pindahkan scroll
// 	$('body').animate({
// 		scrollTop: elemenTujuan.offset().top - 50
// 	}, 1250, 'easeInOutExpo');

// 	e.preventDefault();

// });

// // parallax
// $(window).on('load', function(){
// 	$('.kiri').addClass('kiri-go');
// 	$('.kanan').addClass('kanan-go')
// });

// $(window).scroll(function(){
// 	var wScroll = $(this).scrollTop();

// 	// portfolio
// 	if( wScroll > $('.foto').offset().top - 600 ) {
		
// 		$('.foto .img-thumbnail').each(function(i) {
// 			setTimeout(function() {
// 				$('.foto .img-thumbnail').eq(i).addClass('muncul');
// 			}, 180 * (i+1))

// 		});

// 	}

// });