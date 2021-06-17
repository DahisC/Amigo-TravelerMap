<!-- Button trigger modal -->


<!-- Modal -->

<div class="fade modal" id="attraction-detail-modal">
  <div class="modal-dialog modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header p-0">
        <div v-if="detailTarget.images && detailTarget.images.length !== 0" class="modal-body p-0">
          <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel">
            <div class="carousel-indicators">
              <button v-for="(image, index) in detailTarget.images" :class="{ 'active': index == 0 }" type="button" data-mdb-target="#carouselBasicExample" :data-mdb-slide-to="index" :aria-label="'Slide ' + index"></button>
            </div>

            <div class="carousel-inner">
              <div v-for="(image, index) in detailTarget.images" class="carousel-item" :class="{ 'active': index == 0 }">
                <img :src="image.url" class="d-block w-100 rounded-top" :alt="image.image_desc" />
                <div class=" carousel-caption d-none d-md-block">
                  <p>@{{ image.image_desc }}</p>
                </div>
              </div>
            </div>

            <button class="carousel-control-prev" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          {{-- <button type="button" class="btn-close" data-bs-dismiss="modal2" aria-label="Close"></button> --}}
        </div>
      </div>
      <div class="modal-body">
        {{-- <span v-for="tag in detailTarget.tags" class="badge d-block m-2" style="width: fit-content;" :style="{ 'background-color': tag.color }">@{{ tag.name }}</span> --}}
        {{-- <h4 class="modal-title" id="exampleModalLabel">@{{ detailTarget.name }}</h4> --}}
        <div class="d-flex justify-content-between mb-2">
          <h4 class="modal-title" id="exampleModalLabel">@{{ detailTarget.name }}</h4>
          <div>
            <button type="button" class="btn btn-outline-primary btn-floating" data-mdb-ripple-color="dark">
              <i class="fas fa-star"></i>
            </button>
          </div>
        </div>
        <p>@{{ detailTarget.description }}</p>
      </div>
      <div class="modal-footer d-flex justify-content-between">
        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal2">取消</button> --}}
        <button type="button" class="btn btn-outline-primary btn-block">關閉</button>
      </div>
    </div>
  </div>
</div>
