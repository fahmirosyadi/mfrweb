@extends('layouts/userlayout1')

@section('container2')
<div class="row">
    <div class="col-lg-12 course_details_left">
        <div class="main_image">
            <img class="img-fluid" src="img/courses/course-details.jpg" alt="">
        </div>
        <div class="content_wrapper">
            <div class="event_details_area pb-3 pt-3 mb-30">
                <div class="single-element-widget mt-30">
                    <div class="row mb-4">
                        <div class="col-3">
                            <h3 class="mb-30">Periode</h3>
                            <select class="form-control" id="select-periode">
                                <option>Pilih Periode</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div style="background-color: #002347; height: 1000px" class="single_event d-flex align-items-center mb-3" id="tree"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('pageJs')
<script type="text/javascript">
    let md = new MyCode();
    md.loadPeriode('select-periode');
    
    let header = document.getElementById('header');
    let attrLama = header.getAttribute('class');
    let attrBaru = attrLama + " white-header";
    header.setAttribute('class',attrBaru);


    let mf = new MyFetch();

    OrgChart.templates.ana.img_0 = '<image preserveAspectRatio="xMidYMid slice" xlink:href="/storage/{val}" x="20" y="-15" width="80" height="80"></image>';

    let chart;
    async function loadChart(awal = false) {        
        chart = new OrgChart(document.getElementById("tree"), {
            mouseScrool: OrgChart.action.none,
            lazyLoading: true,
            nodeBinding: {
                field_0: "name",
                field_1: "title",
                img_0: "photo1"
            },
            tags: {
                "subLevels0": {
                    subLevels: 0
                },
                "subLevels1": {
                    subLevels: 1
                },
                "subLevels2": {
                    subLevels: 2
                },
                "subLevels3": {
                    subLevels: 3
                }
            }
        });
        let pilihPeriode = document.getElementById('select-periode');
        let dataLoad = "";
        if (awal == true) {
            dataLoad = await mf.getData('/api/organisasi/' +  new Date().getFullYear());    
        }else{
            dataLoad = await mf.getData('/api/organisasi/' + pilihPeriode.value);
        }
        
        for (let i = 0; i < dataLoad.length; i++) {
            dataLoad[i].tags = [dataLoad[i].tags];
            let photo1 = "organisasi/default.jpg";
            if (dataLoad[i].photo1 != null) {
                photo1 = dataLoad[i].photo1;
            }
            let hasil = {
                id: dataLoad[i].id,
                name: dataLoad[i].name,
                title: dataLoad[i].title,
                pid: dataLoad[i].pid,
                photo1: photo1,
                tags: dataLoad[i].tags
            }
            chart.add(hasil);
        }

        chart.draw(OrgChart.action.init);
    }

    loadChart(true);

    let pilihPeriode = document.getElementById('select-periode');
    pilihPeriode.addEventListener('change', function() {
        loadChart();
    })

</script>
@endsection