@extends('/user/template')
    @section('container')
    <div class="event_details_area pl-5 pr-5 pb-3 pt-3 mb-30">
        <div class="single-element-widget mt-30">
            <div class="row mb-4">
                <div class="col-3">
                    <h3 class="mb-30">Periode</h3>
                    <div class="default-select">
                        <select class="form-control" id="select-periode">

                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div style="background-color: #232637; height: 1000px" class="single_event d-flex align-items-center mb-3" id="tree"></div>
    </div>
    <!-- footer end  -->

    <script type="text/javascript">

        let mf = new MyFetch();

        async function loadPeriode() {
            let periode = document.getElementById('select-periode');
            let lPeriode = await mf.getData('/periode');
            for (var i = 0; i < lPeriode.length; i++) {
                periode.innerHTML += `
                    <option value="` + lPeriode[i].id + `">` + lPeriode[i].periode + `</option>
                `;
                
            }
        }

        

        

       

        OrgChart.templates.ana.img_0 = '<image preserveAspectRatio="xMidYMid slice" xlink:href="/storage/{val}" x="20" y="-15" width="80" height="80"></image>';

        let chart;
        async function loadChart() {        
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
            let dataLoad = await mf.getData('/organisasi/' + pilihPeriode.value);
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

        loadPeriode();

        let pilihPeriode = document.getElementById('select-periode');
        pilihPeriode.addEventListener('change', function() {
            loadChart();
        })

       
    </script>
    @endsection