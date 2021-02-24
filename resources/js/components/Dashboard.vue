<template>
  <div>
    <!-- Dashboard Header Section    -->
    <section class="dashboard-header">
      <div class="container-fluid">
        <div class="row">
          <!-- Statistics -->
          <div class="statistics col-lg-3 col-12">
            <div
              class="statistic d-flex align-items-center bg-white has-shadow"
            >
              <div class="icon bg-red"><i class="fa fa-tasks"></i></div>
              <div class="text">
                <strong>234</strong><br /><small>Applications</small>
              </div>
            </div>
            <div
              class="statistic d-flex align-items-center bg-white has-shadow"
            >
              <div class="icon bg-green">
                <i class="fa fa-calendar-o"></i>
              </div>
              <div class="text">
                <strong>152</strong><br /><small>Interviews</small>
              </div>
            </div>
            <div
              class="statistic d-flex align-items-center bg-white has-shadow"
            >
              <div class="icon bg-orange">
                <i class="fa fa-paper-plane-o"></i>
              </div>
              <div class="text">
                <strong>147</strong><br /><small>Forwards</small>
              </div>
            </div>
          </div>
          <!-- Line Chart            -->
          <div class="chart col-lg-6 col-12">
            <div
              class="line-chart bg-white d-flex align-items-center justify-content-center has-shadow"
            >
              <!-- <canvas id="lineCahrt"></canvas> -->
              <!-- operation table start here -->
              <div class="table-responsive">
                <table class="table table-hover table-bordered table-wrapper">
                  <thead class="p-0">
                    <tr class="bg-info text-white p-0">
                      <th>S/No</th>
                      <th>Operation ID</th>
                      <th>Customer Name</th>
                      <th>Trip</th>
                      <th>Cargo Volume</th>
                      <th>Lifted Tone</th>
                      <th>Remaining Tone</th>
                      <th>%</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                      v-if="operataions.length"
                      v-for="(operation, id) in operataions"
                      :key="operation.id"
                    >
                      <td class="m-1 p-1">{{ operation.id }}</td>
                      <td class="m-1 p-1">{{ operation.operationid }}</td>
                      <td class="m-1 p-1">{{ operation.name }}</td>
                      <td class="m-1 p-1">{{ operation.trip }}</td>
                      <td class="m-1 p-1">{{ operation.tone_given }}</td>
                      <td class="m-1 p-1">{{ operation.performed_tone }}</td>
                      <td class="m-1 p-1">
                        {{ operation.tone_given - operation.performed_tone }}
                      </td>
                      <td class="m-1 p-1">
                        {{
                          Math.round(
                            ((operation.tone_given - operation.performed_tone) /
                              operation.performed_tone) *
                              100
                          )
                        }}
                      </td>
                    </tr>
                    <tr v-if="!operataions.length">
                      <td class="m-1 p-1 text-center" colspan="12">
                        No Data Avilable
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="chart col-lg-3 col-12">
            <!-- Bar Chart   -->
            <div class="bar-chart has-shadow bg-white">
              <div class="title">
                <strong class="text-violet">95%</strong><br /><small
                  >Current Server Uptime</small
                >
              </div>
              <!-- <canvas id="barChartHome"></canvas> -->
            </div>
            <!-- Numbers-->
            <div
              class="statistic d-flex align-items-center bg-white has-shadow"
            >
              <div class="icon bg-green">
                <i class="fa fa-line-chart"></i>
              </div>
              <div class="text">
                <strong>99.9%</strong><br /><small>Success Rate</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Projects Section-->
    <section class="projects no-padding-top">
      <div class="container-fluid">
        <!-- Project-->
        <div class="project">
          <div class="row bg-white has-shadow">
            <div
              class="left-col col-lg-6 d-flex align-items-center justify-content-between"
            >
              <div class="project-title d-flex align-items-center">
                <div class="image has-shadow">
                  <img src="img/project-1.jpg" alt="..." class="img-fluid" />
                </div>
                <div class="text">
                  <h3 class="h4">Project Title</h3>
                  <small>Lorem Ipsum Dolor</small>
                </div>
              </div>
              <div class="project-date">
                <span class="hidden-sm-down">Today at 4:24 AM</span>
              </div>
            </div>
            <div class="right-col col-lg-6 d-flex align-items-center">
              <div class="time"><i class="fa fa-clock-o"></i>12:00 PM</div>
              <div class="comments"><i class="fa fa-comment-o"></i>20</div>
              <div class="project-progress">
                <div class="progress">
                  <div
                    role="progressbar"
                    style="width: 45%; height: 6px"
                    aria-valuenow="25"
                    aria-valuemin="0"
                    aria-valuemax="100"
                    class="progress-bar bg-red"
                  ></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Project-->
        <div class="project">
          <div class="row bg-white has-shadow">
            <div
              class="left-col col-lg-6 d-flex align-items-center justify-content-between"
            >
              <div class="project-title d-flex align-items-center">
                <div class="image has-shadow">
                  <img src="img/project-2.jpg" alt="..." class="img-fluid" />
                </div>
                <div class="text">
                  <h3 class="h4">Project Title</h3>
                  <small>Lorem Ipsum Dolor</small>
                </div>
              </div>
              <div class="project-date">
                <span class="hidden-sm-down">Today at 4:24 AM</span>
              </div>
            </div>
            <div class="right-col col-lg-6 d-flex align-items-center">
              <div class="time"><i class="fa fa-clock-o"></i>12:00 PM</div>
              <div class="comments"><i class="fa fa-comment-o"></i>20</div>
              <div class="project-progress">
                <div class="progress">
                  <div
                    role="progressbar"
                    style="width: 60%; height: 6px"
                    aria-valuenow="25"
                    aria-valuemin="0"
                    aria-valuemax="100"
                    class="progress-bar bg-green"
                  ></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Project-->
        <div class="project">
          <div class="row bg-white has-shadow">
            <div
              class="left-col col-lg-6 d-flex align-items-center justify-content-between"
            >
              <div class="project-title d-flex align-items-center">
                <div class="image has-shadow">
                  <img src="img/project-3.jpg" alt="..." class="img-fluid" />
                </div>
                <div class="text">
                  <h3 class="h4">Project Title</h3>
                  <small>Lorem Ipsum Dolor</small>
                </div>
              </div>
              <div class="project-date">
                <span class="hidden-sm-down">Today at 4:24 AM</span>
              </div>
            </div>
            <div class="right-col col-lg-6 d-flex align-items-center">
              <div class="time"><i class="fa fa-clock-o"></i>12:00 PM</div>
              <div class="comments"><i class="fa fa-comment-o"></i>20</div>
              <div class="project-progress">
                <div class="progress">
                  <div
                    role="progressbar"
                    style="width: 100%; height: 6px"
                    aria-valuenow="25"
                    aria-valuemin="0"
                    aria-valuemax="100"
                    class="progress-bar bg-violet"
                  ></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Project-->
        <div class="project">
          <div class="row bg-white has-shadow">
            <div
              class="left-col col-lg-6 d-flex align-items-center justify-content-between"
            >
              <div class="project-title d-flex align-items-center">
                <div class="image has-shadow">
                  <img src="img/project-4.jpg" alt="..." class="img-fluid" />
                </div>
                <div class="text">
                  <h3 class="h4">Project Title</h3>
                  <small>Lorem Ipsum Dolor</small>
                </div>
              </div>
              <div class="project-date">
                <span class="hidden-sm-down">Today at 4:24 AM</span>
              </div>
            </div>
            <div class="right-col col-lg-6 d-flex align-items-center">
              <div class="time"><i class="fa fa-clock-o"></i>12:00 PM</div>
              <div class="comments"><i class="fa fa-comment-o"></i>20</div>
              <div class="project-progress">
                <div class="progress">
                  <div
                    role="progressbar"
                    style="width: 50%; height: 6px"
                    aria-valuenow="25"
                    aria-valuemin="0"
                    aria-valuemax="100"
                    class="progress-bar bg-orange"
                  ></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  created() {
    this.getOperations();
  },
  data() {
    return {
      operataions: [],
    };
  },
  methods: {
    async getOperations() {
      const res = await this.callApi("get", "/dashboard/operation");
      if (res.status == 200) {
        this.operataions = res.data;
      } else {
        console.log("ERorrrrrr");
      }
    },
  },
};
</script>

<style>
</style>
