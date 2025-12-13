<?php 

// This file is for the Theme Home page or landing page

get_header();
?>

<main>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cleancraft_hero">
                        <div class="hero-content-area">
                            <h5>Hi, I am a</h5>
                            <h1>Web Developer</h1>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Obcaecati quis nihil culpa?</p>
                        </div>
                        <div class="hero-image-area">
                            <img class="hero_img" src="" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <!-- ========================= -->
<!-- START: CUSTOM QUOTE FORMS -->
<!-- ========================= -->

<style>
/* ===== Form Container ===== */
.cpf {
  font-family: Arial, sans-serif;
  max-width: 980px;
  margin: 20px auto;
  padding: 10px;
  box-sizing: border-box;
}

/* Tabs */
.cpf .tabs {
  display: flex;
  gap: 12px;
  justify-content: center;
  margin-bottom: 18px;
}
.cpf .tab-btn {
  padding: 10px 18px;
  border-radius: 8px;
  border: 0;
  cursor: pointer;
  font-weight: 600;
  background: #ffd973;
  color: #222;
  box-shadow: 0 6px 18px rgba(0,0,0,0.06);
}
.cpf .tab-btn.active { background:#0867ff; color:#fff; }

/* Panel */
.cpf .panel {
  background: #fff;
  border-radius: 12px;
  padding: 22px;
  box-shadow: 0 8px 26px rgba(11,19,40,0.06);
}
.cpf .hidden { display: none !important; }

/* Rows & Columns */
.cpf .row {
  display: flex;
  gap: 18px;
  flex-wrap: wrap;
  margin-bottom: 14px;
}
.cpf .col {
  flex: 1 1 300px;
  min-width: 230px;
}

/* Labels and Inputs */
.cpf label.field-label { display:block; font-weight:600; margin-bottom:6px; font-size:14px; }
.cpf input, .cpf select, .cpf textarea {
  width: 100%;
  padding: 12px;
  border-radius: 10px;
  border: 1px solid #e0e0e0;
  background: #f6f7f8;
  box-sizing: border-box;
  font-size:14px;
}
.cpf textarea { min-height:110px; resize:vertical; }

/* Services Left/Right */
.cpf .services-block { 
    display:flex; 
    gap:22px; 
    flex-wrap:wrap; 
    align-items:flex-start; 
}
.cpf .services-left, 
.cpf .services-right { 
    flex:1 1 260px; 
    min-width:220px; 
    
}

/* Checkbox alignment */
.cpf .services-left label {
  display:flex;
  align-items:center;
  gap:10px;
  margin-bottom:8px;
  font-size:15px;
}
.cpf input[type="checkbox"] {
  width:18px;
  height:18px;
}

/* LEFT column bottom padding to align with right */
.cpf .services-left {
    padding-bottom: 50px;
}

/* Align Frequency + Details */
.cpf .align-row { 
    display:flex; 
    gap:20px; 
    flex-wrap:wrap; 
    align-items:flex-start; 
    margin-top: 55px;
}
.cpf .align-row .col { 
    min-width:260px; 
    flex:1; 
}

/* Submit + success */
.cpf .submit-row { 
  text-align:right; 
}
.cpf .btn { 
    padding:12px 18px; 
    border-radius:10px; 
    border:0; 
    cursor:pointer; 
    font-size:15px; 
    background:#0867ff; 
    color:#fff; 
}
.cpf .success { 
    background:#e8ffe9; 
    border-left:4px solid #2ecc71; 
    padding:12px; 
    margin-top:10px; 
    border-radius:8px; 
    color:#187d3b; 
    font-size:15px; 
}

/* Mobile */
@media (max-width:700px) {
  .cpf .services-block { flex-direction:column; }
  .cpf .align-row { flex-direction:row; margin-top: -20px;}
  .cpf .services-left { padding-bottom: 0px; }
  .cpf .tab-btn { width:48%; }
  .services-left{ width: 100%;}

  .cpf .services-left, 
  .cpf .services-right { 
      flex:1 1 260px; 
      min-width:100%; 
      /* margin-top: -20px; */
  }

  .cpf .submit-row{
    margin-top: 50px;
  }

  .cpf .services-right{

    display: flex;
    flex-direction: column-reverse;
    position:static;
    margin-top: -20px;
  }

  .cpf .additional{
    position: static !important;
    margin-bottom: -160px;
  }
  div#c-be-panel{
    margin-top: 10px;
  }
  #residentialForm .align-row{
    flex-direction: column-reverse;
  }
  .cpf .align-row .col { 
    min-width:100%; 
}
}
</style>

<div class="cpf">

  <!-- Tabs -->
  <div class="tabs">
    <button class="tab-btn active" data-panel="commercial">Commercial Quote</button>
    <button class="tab-btn" data-panel="residential">Residential Quote</button>
  </div>

  <!-- ========================= -->
  <!-- COMMERCIAL PANEL -->
  <!-- ========================= -->
  <div class="panel" id="panel-commercial">
    <form id="commercialForm">

      <div class="row">
        <div class="col"><label class="field-label">Name *</label><input name="name" required></div>
        <div class="col"><label class="field-label">Phone *</label><input name="phone" type="tel" required></div>
      </div>

      <div class="row">
        <div class="col"><label class="field-label">Email *</label><input name="email" type="email" required></div>
      </div>

      <div class="row">
        <div class="col"><label class="field-label">Business Address *</label><input name="address" required></div>
        <div class="col">
          <label class="field-label">Category *</label>
          <select name="category" required>
            <option value="">Select category</option>
            <option>Retail</option><option>Multifamily</option>
            <option>Drive-Thru</option><option>Restaurant</option>
          </select>
        </div>
      </div>

      <!-- Service Block -->
      <div class="row services-block">

        <div class="services-left">
          <label class="field-label">Services Needed *</label>

          <label><input type="checkbox" name="services[]" value="Sidewalks"> Sidewalks</label>
          <label><input type="checkbox" name="services[]" value="Parking Lot"> Parking Lot</label>
          <label><input type="checkbox" id="c-be" name="services[]" value="Building Exterior"> Building Exterior</label>
          <label><input type="checkbox" id="c-dump" name="services[]" value="Dumpster"> Dumpster</label>
          <label><input type="checkbox" name="services[]" value="Window Cleaning"> Window Cleaning (≤3 stories)</label>

          <div class="align-row">
            <div class="col">
              <label class="field-label" style="margin-top: 26px;">Desired Frequency *</label>
              <select name="frequency" required>
                <option value="">Select</option>
                <option>One-Time</option><option>Bi-Weekly</option>
                <option>Monthly</option><option>Quarterly</option>
              </select>
            </div>
          </div>
        </div>

        <div class="services-right" style="position: relative;">
          <div id="c-be-panel" class="hidden">
            <label class="field-label">How many stories?</label>
            <input name="stories" type="number" min="1">
          </div>

          <div id="c-dump-panel" class="hidden" style="margin-top: 8px;">
            <label class="field-label">Number of Dumpsters</label>
            <input name="dumpsters" type="number" min="1">
          </div>

          <div class="col additional" style="position:absolute; right:0; top:165px; width:100%;">
            <label class="field-label">Additional Details</label>
            <textarea name="details"></textarea>
          </div>
        </div>

      </div>

      <div class="submit-row" style="margin-top: -30px;">
        <button class="btn" type="submit">Submit Commercial Quote</button>
      </div>

      <div class="success hidden" id="cSuccess">Your commercial quote request has been sent successfully.</div>
    </form>
  </div>

  <!-- ========================= -->
  <!-- RESIDENTIAL PANEL (FIXED) -->
  <!-- ========================= -->
    <div class="panel hidden" id="panel-residential">

        <form id="residentialForm">

            <div class="row">
                <div class="col"><label class="field-label">Name *</label><input name="name" required></div>
                <div class="col"><label class="field-label">Phone *</label><input name="phone" type="tel" required></div>
            </div>

            <div class="row">
                <div class="col"><label class="field-label">Email *</label><input name="email" type="email" required></div>
            </div>

            <div class="row">
                <div class="col"><label class="field-label">Address *</label><input name="address" required></div>
            </div>

            <!-- FIXED SERVICE BLOCK -->
            <div class="row services-block" style="display: flex; justify-content: space-between; align-items: start;">

                <div class="services-left">
                    <label class="field-label">Services *</label>

                    <label><input type="checkbox" name="services[]" value="Sidewalks"> Sidewalks</label>
                    <label><input type="checkbox" name="services[]" value="Driveway"> Driveway</label>
                    <label><input type="checkbox" name="services[]" value="Patio"> Patio</label>

                    <label><input type="checkbox" id="r-be" name="services[]" value="Building Exterior"> Building Exterior</label>

                    <label><input type="checkbox" name="services[]" value="Window Cleaning"> Window Cleaning</label>
                </div>

                <div class="services-right">
                <div id="r-be-panel" class="hidden">
                    <label class="field-label">How many stories?</label>
                    <input name="stories" type="number" min="1">

                    <label class="field-label" style="margin-top:12px;">Square Footage (SF)</label>
                    <input name="square_feet" type="number" min="0">
                </div>
                </div>

            </div>

            <div class="align-row" style="display: flex; justify-content: space-between; align-items: end; margin-top: 40px;">
                <div class="col">
                <label class="field-label">Desired Frequency *</label>
                <select name="frequency" required>
                    <option value="">Select</option>
                    <option>One-Time</option><option>Bi-Weekly</option>
                    <option>Monthly</option><option>Quarterly</option>
                </select>
                </div>

                <div class="col" style="margin-top: -90px; padding-bottom:20px ;">
                <label class="field-label">Additional Details</label>
                <textarea style="margin-bottom:-27px;" name="details"></textarea>
                </div>
            </div>

            <div class="submit-row" style="margin-top: 30px;">
                <button class="btn" type="submit">Submit Residential Quote</button>
            </div>

            <div class="success hidden" id="rSuccess">
                Your residential quote request has been sent successfully.
            </div>

        </form>

        <div style="border:2px solid #e6c9ff; padding:14px; border-radius:6px; margin-top:20px; color:#111;">
        <p>We provide a subscription model for Windows and Pressure Washing.</p>
        <p>Our quarterly window cleaning subscription allows us to apply a protective coat which protects your windows from dirt and water spots. If your windows get dirty prior to the quarterly appointment, we will come out for free to fix the dirty window.</p>
        <p>What happens in the winter? Our annual subscription includes three exterior cleans per year and one interior window cleaning.</p>
        <p>On average, our subscriptions save you 12% per year.</p>
        </div>

    </div>
</div>

<script>
/* ========= TAB SWITCH ========= */
document.querySelectorAll('.cpf .tab-btn').forEach(btn => {
  btn.addEventListener('click', function(){
    document.querySelectorAll('.cpf .tab-btn').forEach(b => b.classList.remove('active'));
    document.querySelectorAll('.cpf .panel').forEach(p => p.classList.add('hidden'));
    btn.classList.add('active');
    document.getElementById('panel-' + btn.dataset.panel).classList.remove('hidden');
  });
});

/* ========= CONDITIONAL FIELDS ========= */
const cBE = document.getElementById("c-be");
const cBEpanel = document.getElementById("c-be-panel");
if (cBE) cBE.addEventListener('change', ()=> cBEpanel.classList.toggle('hidden', !cBE.checked));

const cDump = document.getElementById("c-dump");
const cDumpPanel = document.getElementById("c-dump-panel");
if (cDump) cDump.addEventListener('change', ()=> cDumpPanel.classList.toggle('hidden', !cDump.checked));

const rBE = document.getElementById("r-be");
const rBEpanel = document.getElementById("r-be-panel");
if (rBE) rBE.addEventListener('change', ()=> rBEpanel.classList.toggle('hidden', !rBE.checked));

/* ========= AJAX SUBMISSION ========= */
function submitForm(formId, successBoxId, subject){
  const form = document.getElementById(formId);
  const box = document.getElementById(successBoxId);

  form.addEventListener("submit", function(e){
    e.preventDefault();

    let data = new FormData(form);
    data.append("action", "send_custom_form");
    data.append("email_to", "mdshakiburrahman448@gmail.com");
    data.append("subject", subject);

    fetch("/wp-admin/admin-ajax.php", { method: "POST", body: data })
      .then(response => response.json())
      .then(json => {
        if (json.success) {
          box.classList.remove("hidden");
          form.reset();

          if (cBEpanel) cBEpanel.classList.add('hidden');
          if (cDumpPanel) cDumpPanel.classList.add('hidden');
          if (rBEpanel) rBEpanel.classList.add('hidden');

          setTimeout(()=> box.classList.add("hidden"), 5000);
        } else { alert('Submission failed. Try again.'); }
      })
      .catch(err=>{ console.error(err); alert('An error occurred. Try again later.'); });
  });
}

submitForm("commercialForm", "cSuccess", "New Commercial Quote Request");
submitForm("residentialForm", "rSuccess", "New Residential Quote Request");
</script>

<!-- ========================= -->
<!-- END: CUSTOM QUOTE FORMS -->
<!-- ========================= -->

    </section>
</main>

<?php get_footer(); ?>

