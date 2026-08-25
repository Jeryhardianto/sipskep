$(function() {
    "use strict";

    $(".preloader").fadeOut();
    // ============================================================== 
    // Theme options
    // ==============================================================     
    // ============================================================== 
    // sidebar-hover
    // ==============================================================

    $(".left-sidebar").hover(
        function() {
            $(".navbar-header").addClass("expand-logo");
        },
        function() {
            $(".navbar-header").removeClass("expand-logo");
        }
    );
    // this is for close icon when navigation open in mobile view
    $(".nav-toggler").on('click', function() {
        $("#main-wrapper").toggleClass("show-sidebar");
        $(".nav-toggler i").toggleClass("ti-menu");
    });
    $(".nav-lock").on('click', function() {
        $("body").toggleClass("lock-nav");
        $(".nav-lock i").toggleClass("mdi-toggle-switch-off");
        $("body, .page-wrapper").trigger("resize");
    });
    $(".search-box a, .search-box .app-search .srh-btn").on('click', function() {
        $(".app-search").toggle(200);
        $(".app-search input").focus();
    });

    // ============================================================== 
    // Right sidebar options
    // ==============================================================
    $(function() {
        $(".service-panel-toggle").on('click', function() {
            $(".customizer").toggleClass('show-service-panel');

        });
        $('.page-wrapper').on('click', function() {
            $(".customizer").removeClass('show-service-panel');
        });
    });
    // ============================================================== 
    // This is for the floating labels
    // ============================================================== 
    $('.floating-labels .form-control').on('focus blur', function(e) {
        $(this).parents('.form-group').toggleClass('focused', (e.type === 'focus' || this.value.length > 0));
    }).trigger('blur');

    // ============================================================== 
    //tooltip
    // ============================================================== 
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
    // ============================================================== 
    //Popover
    // ============================================================== 
    $(function() {
        $('[data-toggle="popover"]').popover()
    })

    // ============================================================== 
    // Perfact scrollbar
    // ============================================================== 
    $('.message-center, .customizer-body, .scrollable').perfectScrollbar({
        wheelPropagation: !0
    });

    /*var ps = new PerfectScrollbar('.message-body');
    var ps = new PerfectScrollbar('.notifications');
    var ps = new PerfectScrollbar('.scroll-sidebar');
    var ps = new PerfectScrollbar('.customizer-body');*/

    // ============================================================== 
    // Resize all elements
    // ============================================================== 
    $("body, .page-wrapper").trigger("resize");
    $(".page-wrapper").delay(20).show();
    // ============================================================== 
    // To do list
    // ============================================================== 
    $(".list-task li label").click(function() {
        $(this).toggleClass("task-done");
    });

    //****************************
    /* This is for the mini-sidebar if width is less then 1170*/
    //**************************** 
    var setsidebartype = function() {
        var width = (window.innerWidth > 0) ? window.innerWidth : this.screen.width;
        if (width < 1170) {
            $("#main-wrapper").attr("data-sidebartype", "mini-sidebar");
        } else {
            $("#main-wrapper").attr("data-sidebartype", "full");
        }
    };
    $(window).ready(setsidebartype);
    $(window).on("resize", setsidebartype);
    //****************************
    /* This is for sidebartoggler*/
    //****************************
    $('.sidebartoggler').on("click", function() {
        $("#main-wrapper").toggleClass("mini-sidebar");
        if ($("#main-wrapper").hasClass("mini-sidebar")) {
            $(".sidebartoggler").prop("checked", !0);
            $("#main-wrapper").attr("data-sidebartype", "mini-sidebar");
        } else {
            $(".sidebartoggler").prop("checked", !1);
            $("#main-wrapper").attr("data-sidebartype", "full");
        }
    });
});
    function previewImage() {
            document.getElementById("image-preview").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("image-preview").src = oFREvent.target.result;
            };
        };

        //custom preview

        function previewImageKontak() {
            document.getElementById("image-preview").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("image-preview").src = oFREvent.target.result;
            };
        };

        function previewImageSosmed() {
            document.getElementById("image-sosmed").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("image-sosmed").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("image-sosmed-preview").src = oFREvent.target.result;
            };
        };

        //custom table

        var table = document.getElementById("exa3");


        function tambahDeskripsi() {
            var judul = document.getElementById("judul").value;
            var deskripsi = document.getElementById("deskripsi").value;

            var row = table.insertRow(-1);
            var celno = row.insertCell(0);
            var cell1 = row.insertCell(1);
            var cell2 = row.insertCell(2);
            var cell3 = row.insertCell(3);

            celno.innerHTML = '<input type="hidden value='.concat('>');
            cell1.innerHTML = '<input type="hidden" name="judul[]" value='.concat(judul, '>', judul);
            cell2.innerHTML = '<input type="hidden" name="deskripsi[]" value='.concat(deskripsi, '>', deskripsi);


            //cell3.innerHTML='<input type="button" id="del" value="Delete" onclick="deleteRow(this)"/>';
            cell3.innerHTML =
                '<button type="button" class="btn btn-sm btn-danger" onclick="deleteRow(this)"><i class="fas fa-trash"></i> Delete</button>';

            //document.getElementById("product").value='';
            document.getElementById("quantity").value = '';
        }

        var table = document.getElementById("exa4");
        function tambahProduk() {
            var jdl = document.getElementById("judul").value;
            var dsp = document.getElementById("deskripsi").value;
            var img = document.getElementById("image-source").value;

             var row = table.insertRow(-1);
            var celno = row.insertCell(0);
            var cell1 = row.insertCell(1);
            var cell2 = row.insertCell(2);
            var cell3 = row.insertCell(3);
            var cell4 = row.insertCell(4);

            celno.innerHTML = '<input type="hidden value='.concat('>');
            cell1.innerHTML = '<input type="hidden" name="jdl[]" value='.concat(jdl, '>', jdl);
            cell2.innerHTML = '<input type="hidden" name="dsp[]" value='.concat(dsp, '>', dsp);
            cell3.innerHTML = '<input type="hidden" name="img[]" value='.concat(img, '>', img);

             cell4.innerHTML =
                '<button type="button" class="btn btn-sm btn-danger" onclick="deleteRow(this)"><i class="fas fa-trash"></i> Delete</button>';

                 document.getElementById("quantity").value = '';
        }

        var table = document.getElementById("exa5");
          function tambahTestimoni() {
            var nama = document.getElementById("nama").value;
            var asal = document.getElementById("asal").value;
            var testimoni = document.getElementById("testimoni").value;
            var img = document.getElementById("image-source").value;

             var row = table.insertRow(-1);
            var celno = row.insertCell(0);
            var cell1 = row.insertCell(1);
            var cell2 = row.insertCell(2);
            var cell3 = row.insertCell(3);
            var cell4 = row.insertCell(4);
            var cell5 = row.insertCell(5);

            celno.innerHTML = '<input type="hidden value='.concat('>');
            cell1.innerHTML = '<input type="hidden" name="nama[]" value='.concat(nama, '>', nama);
            cell2.innerHTML = '<input type="hidden" name="asal[]" value='.concat(asal, '>', asal);
            cell3.innerHTML = '<input type="hidden" name="testimoni[]" value='.concat(testimoni, '>', testimoni);
            cell4.innerHTML = '<input type="hidden" name="img[]" value='.concat(img, '>', img);

             cell5.innerHTML =
                '<button type="button" class="btn btn-sm btn-danger" onclick="deleteRow(this)"><i class="fas fa-trash"></i> Delete</button>';

                 document.getElementById("quantity").value = '';
        }

        var table = document.getElementById("psosmed");
        function tambahSosmed() {
            var img1 = document.getElementById("image-sosmed").value;
            var akn = document.getElementById("akun").value;
            var lnk = document.getElementById("link").value;

             var row = table.insertRow(-1);
            var celno = row.insertCell(0);
            var cell1 = row.insertCell(1);
            var cell2 = row.insertCell(2);
            var cell3 = row.insertCell(3);
            var cell4 = row.insertCell(4);

            celno.innerHTML = '<input type="hidden value='.concat('>');
            cell1.innerHTML = '<input type="hidden" name="img1[]" value='.concat(img1, '>', img1);
            cell2.innerHTML = '<input type="hidden" name="akn[]" value='.concat(akn, '>', akn);
            cell3.innerHTML = '<input type="hidden" name="lnk[]" value='.concat(lnk, '>', lnk);

             cell4.innerHTML =
                '<button type="button" class="btn btn-sm btn-danger" onclick="deleteRow(this)"><i class="fas fa-trash"></i> Delete</button>';

                 document.getElementById("quantity").value = '';
        }


        var table = document.getElementById("FeedIG");
        function tambahFeedIG() {
            var ig = document.getElementById("linkfeed").value;

            var row = table.insertRow(-1);
            var celno = row.insertCell(0);
            var cel1 = row.insertCell(1);
            var cel2 = row.insertCell(2);

            celno.innerHTML = '<input type="hidden value='.concat('>');
            cel1.innerHTML = '<input type="hidden" name="ig[]" value='.concat(ig, '>', ig);

            cel2.innerHTML =
                '<button type="button" class="btn btn-sm btn-danger" onclick="deleteRow(this)"><i class="fas fa-trash"></i> Delete</button>';

                 document.getElementById("quantity").value = '';
        }


        var table = document.getElementById("p-kontak");
        function tambahKontak() {
            var img = document.getElementById("image-source").value;
            var nm = document.getElementById("nama").value;
            var al = document.getElementById("alamat").value;
            var lk = document.getElementById("link-kontak").value;

            
            var row = table.insertRow(-1);
            var celno = row.insertCell(0);
            var cel1 = row.insertCell(1);
            var cel2 = row.insertCell(2);
            var cel3 = row.insertCell(3);
            var cel4 = row.insertCell(4);
            var cel5 = row.insertCell(5);

            celno.innerHTML = '<input type="hidden value='.concat('>');
            cel1.innerHTML = '<input type="hidden" name="img[]" value='.concat(img, '>', img);
            cel2.innerHTML = '<input type="hidden" name="nm[]" value='.concat(nm, '>', nm);
            cel3.innerHTML = '<input type="hidden" name="al[]" value='.concat(al, '>', al);
            cel4.innerHTML = '<input type="hidden" name="lk[]" value='.concat(lk, '>', lk);

            cel5.innerHTML =
                '<button type="button" class="btn btn-sm btn-danger" onclick="deleteRow(this)"><i class="fas fa-trash"></i> Delete</button>';

                 document.getElementById("quantity").value = '';
        }

        function deleteRow(el) {
            var i = el.parentNode.parentNode.rowIndex;
            table.deleteRow(i);
            while (table.rows[i]) {
                updateRow(table.rows[i], i, false);
                i++;
            }
        }