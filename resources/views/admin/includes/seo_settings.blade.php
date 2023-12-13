<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3">Seo Settings</h4>
                <form id="seo_setting_form">
                    @csrf
                    <input type="hidden" name="page" value="{{$page}}">
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="mb-1"><b>Seo Title</b></label>
                                <input autocomplete="off" value="{{$seoSetting->seo_title ?? ''}}"
                                       placeholder="Seo Title" type="text"
                                       class="form-control"
                                       name="seo_title">
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="form-group">
                                <label for="" class="mb-1"><b>Seo keywords</b></label>
                                <input autocomplete="off" value="{{$seoSetting->seo_keywords ?? ''}}"
                                       placeholder="Seo Keywords"
                                       id="seoTags" type="text"
                                       class="form-control"
                                       name="seo_keywords">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="" class="mb-1"><b>Seo Description</b></label>
                                <textarea autocomplete="off" placeholder="Seo Description" class="form-control"
                                          name="seo_description" id="" cols="05"
                                          rows="05">{{$seoSetting->seo_description ?? ''}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary seoSubmitBtn">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
