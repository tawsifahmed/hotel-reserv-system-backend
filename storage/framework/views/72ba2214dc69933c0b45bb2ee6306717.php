<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body style="margin: auto; max-width: 100vw; color: #023b67">
    <style>
      @font-face {
        font-family: "BebasNeueBold";
        font-style: normal;
        src: url("./assets/BebasNeue-Bold.ttf");
      }
      .details {
        font-family: "BebasNeueBold", sans-serif;
      }
      .cell {
        background-color: #f5f8f8;
            border-radius: 5px;
            border: 1px solid #dbdbdb;
            margin: 0 2px;
            /* height: fit-content; */
            height: 25px;
            width: 25px;
            /* display: flex; */
            /* align-items: center; */
            /* justify-content: center; */
            float: left;
      }
      .divider {
        font-weight: 400;
        width: 8px;
        background-color: #023b67;
        height: 1px !important;
        margin: 0 4px;
      }
      .label {
        font-weight: 600;
        color: #023b67;
        text-wrap: nowrap;
        margin-top: 0;
        margin-bottom: 0;
      }
      .border {
            border: 1px solid #eff2f7 !important;
        }
      .border {
        border-bottom: 1px solid #e4e4e4 !important;
        width: 100%;
      }
      td {
        padding: 10px 0;
      }
      input[type="radio"]:after {
        width: 12px;
        height: 12px;
        border-radius: 15px;
        top: -2px;
        left: -1px;
        position: relative;
        background-color: white;
        content: "";
        display: inline-block;
        visibility: visible;
        border: 2px solid #023b67;
      }

      input[type="radio"]:checked:after {
        width: 12px;
        height: 12px;
        border-radius: 15px;
        top: -2px;
        left: -1px;
        position: relative;
        background-color: #023b67;
        content: "";
        display: inline-block;
        visibility: visible;
        border: 2px solid #023b67;
      }
      .education {
        width: 100%;
        border: 1px solid rgb(161, 161, 161);
        border-collapse: collapse;
      }
      .education th {
        border: 1px solid rgb(161, 161, 161);
        border-collapse: collapse;
        padding: 5px;
        font-weight: 400;
      }
      .education td {
        border: 1px solid rgb(161, 161, 161);
        border-collapse: collapse;
        padding: 5px !important;
      }
      .heading {
        color: #023b67;
        font-weight: 600;
        font-size: 20px;
        text-align: center;
      }
    </style>
    <table
      style="background-color: rgb(255, 255, 255); width: 100%; margin: 0 auto"
    >
      <tr>
        <td>
          <table style="width: 100%">
            <thead>
              <th style="width: 30%"></th>
              <th style="width: 40%"></th>
              <th style="width: 30%"></th>
            </thead>
            <tbody>
              <td>
                <img src="./assets/logo.png" alt="" />
              </td>
              <td class="details" style="text-align: center">
                <h1
                  style="
                    font-size: 60px;
                    color: #023b67;
                    font-weight: 700;
                    margin: 0;
                  "
                >
                  B Charge
                </h1>
                <p
                  style="
                    font-weight: 400;
                    font-size: 18px;
                    color: #023b67;
                    margin: 5px 0;
                  "
                >
                  CES (A) 11A, Road-113, Gulshan, Dhaka-1212
                </p>
                <p
                  style="
                    font-size: 35px;
                    color: #023b67;
                    font-weight: 700;
                    margin: 5px 0;
                  "
                >
                  APPLICATION FOR MEMBERSHIP
                </p>
                <p
                  style="
                    font-size: 18px;
                    color: #023b67;
                    font-weight: 400;
                    margin: 5px 0;
                  "
                >
                  (PLEASE FILL THE APPLICATION IN
                  <span style="font-weight: 600">BLOCK LETTER</span> )
                </p>
              </td>
              <td>
                <div
                  class=""
                  style="height: 12rem; display: flex; justify-content: end"
                >
                  <img
                    src="./assets/profile.png"
                    alt=""
                    style="height: 100%; width: auto"
                  />
                </div>
              </td>
            </tbody>
          </table>
        </td>
      </tr>
      <tr>
        <td style="display: flex; justify-content: space-between">
          <div class="" style="display: flex; align-items: center">
            <p class="label" style="margin-right: 30px">Membership No</p>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
          </div>
          <div class="" style="display: flex; align-items: center">
            <p class="label" style="margin-right: 30px">Date</p>
            <div class="cell"></div>
            <div class="cell"></div>
            <span class="divider"></span>
            <div class="cell"></div>
            <div class="cell"></div>
            <span class="divider"></span>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
          </div>
        </td>
      </tr>
      <tr>
        <td style="display: flex; gap: 30px">
          <p class="label">Type of Membership</p>
          <div
            class=""
            style="
              display: flex;
              gap: 30px;
              align-items: center;
              justify-content: space-around;
            "
          >
            <div class="" style="display: flex; align-items: center; gap: 10px">
              <input
                type="radio"
                style="margin: 0"
                name="memberType"
                id="memberType"
                value="general"
                disabled
                checked
              />
              <label style="color: #023b67; font-weight: 400" for="memberType"
                >General</label
              >
            </div>
            <div class="" style="display: flex; align-items: center; gap: 10px">
              <input
                type="radio"
                style="margin: 0"
                name="memberType"
                id="memberType2"
                value="life"
                disabled
              />
              <label style="color: #023b67; font-weight: 400" for="memberType2"
                >Life</label
              >
            </div>
            <div class="" style="display: flex; align-items: center; gap: 10px">
              <input
                type="radio"
                style="margin: 0"
                name="memberType"
                id="memberType3"
                value="Donor"
                disabled
              />
              <label style="color: #023b67; font-weight: 400" for="memberType3"
                >Donor</label
              >
            </div>
            <div class="" style="display: flex; align-items: center; gap: 10px">
              <input
                type="radio"
                style="margin: 0"
                name="memberType"
                id="memberType4"
                value="Founder"
                disabled
              />
              <label style="color: #023b67; font-weight: 400" for="memberType4"
                >Founder</label
              >
            </div>
            <div class="" style="display: flex; align-items: center; gap: 10px">
              <input
                type="radio"
                style="margin: 0"
                name="memberType"
                id="memberType4"
                value="Corporate"
                disabled
              />
              <label style="color: #023b67; font-weight: 400" for="memberType5"
                >Corporate</label
              >
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td style="display: flex; gap: 5px">
          <p class="label">Name</p>
          <div class="border"></div>
        </td>
      </tr>
      <tr>
        <td style="display: flex; gap: 5px">
          <p class="label">Date of Birth</p>
          <div class="border"></div>
        </td>
      </tr>
      <tr>
        <td style="display: flex; gap: 5px">
          <p class="label">NID Number</p>
          <div class="border"></div>
        </td>
      </tr>
      <tr>
        <td style="display: flex; gap: 5px">
          <p class="label">Passport Number</p>
          <div class="border"></div>
        </td>
      </tr>
      <tr>
        <td>
          <p class="label">Educational Background</p>
        </td>
      </tr>
      <tr>
        <td>
          <table class="education">
            <thead>
              <th style="width: 40%">Name of Institute</th>
              <th style="width: 20%">Year</th>
              <th style="width: 40%">Degree/Qualification Obtained</th>
            </thead>
            <tbody>
              <tr>
                <td height="20"></td>
                <td height="20"></td>
                <td height="20"></td>
              </tr>
              <tr>
                <td height="20"></td>
                <td height="20"></td>
                <td height="20"></td>
              </tr>
              <tr>
                <td height="20"></td>
                <td height="20"></td>
                <td height="20"></td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
      <tr>
        <td style="display: flex; gap: 30px; justify-content: space-between">
          <div class="" style="display: flex; align-items: center; gap: 30px">
            <p class="label">Marital Status</p>
            <div
              class=""
              style="
                display: flex;
                gap: 30px;
                align-items: center;
                justify-content: space-around;
              "
            >
              <div
                class=""
                style="display: flex; align-items: center; gap: 10px"
              >
                <input
                  type="radio"
                  style="margin: 0"
                  name="maritialStatus"
                  id="maritialStatus"
                  value="married"
                  checked
                  disabled
                />
                <label
                  style="color: #023b67; font-weight: 400"
                  for="maritialStatus"
                  >Married</label
                >
              </div>
              <div
                class=""
                style="display: flex; align-items: center; gap: 10px"
              >
                <input
                  type="radio"
                  style="margin: 0"
                  name="maritialStatus"
                  id="maritialStatus1"
                  value="single"
                  disabled
                />
                <label
                  style="color: #023b67; font-weight: 400"
                  for="maritialStatus1"
                  >Single</label
                >
              </div>
            </div>
          </div>
          <div class="" style="display: flex; align-items: center">
            <p class="label" style="margin-right: 30px">Date of Anniversary</p>
            <div class="cell"></div>
            <div class="cell"></div>
            <span class="divider"></span>
            <div class="cell"></div>
            <div class="cell"></div>
            <span class="divider"></span>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
          </div>
        </td>
      </tr>
      <tr>
        <td style="display: flex; gap: 5px">
          <p class="label">No. of Dependents</p>
          <div class="border"></div>
        </td>
      </tr>
      <tr>
        <td style="display: flex; gap: 5px">
          <p class="label">Father's Nmae</p>
          <div class="border"></div>
        </td>
      </tr>
      <tr>
        <td style="display: flex; gap: 5px">
          <p class="label">Mother's Name</p>
          <div class="border"></div>
        </td>
      </tr>
      <tr>
        <td style="display: flex; justify-content: space-between; gap: 10px">
          <div class="" style="display: flex; align-items: center">
            <p class="label" style="margin-right: 20px">Mobile Number</p>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
          </div>
          <div class="" style="display: flex; align-items: center">
            <p class="label" style="margin-right: 20px">Phone Number</p>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
          </div>
        </td>
      </tr>
      <tr>
        <td style="display: flex; gap: 5px">
          <p class="label">Email ID</p>
          <div class="border"></div>
        </td>
      </tr>
      <tr>
        <td style="display: flex; gap: 5px">
          <p class="label">Permanent Address</p>
          <div class="border"></div>
        </td>
      </tr>
      <tr>
        <td style="display: flex; gap: 5px">
          <p class="label">Present Address</p>
          <div class="border"></div>
        </td>
      </tr>
      <tr>
        <td style="display: flex; gap: 30px">
          <p class="label">Occupation Type</p>
          <div
            class=""
            style="
              display: flex;
              gap: 30px;
              align-items: center;
              justify-content: space-around;
            "
          >
            <div class="" style="display: flex; align-items: center; gap: 10px">
              <input
                type="radio"
                style="margin: 0"
                name="work"
                id="work1"
                value="service"
                checked
                disabled
              />
              <label style="color: #023b67; font-weight: 400" for="work1"
                >Service</label
              >
            </div>
            <div class="" style="display: flex; align-items: center; gap: 10px">
              <input
                type="radio"
                style="margin: 0"
                name="work"
                id="work2"
                value="self-employed"
                disabled
              />
              <label style="color: #023b67; font-weight: 400" for="work2"
                >Self Employed</label
              >
            </div>
            <div class="" style="display: flex; align-items: center; gap: 10px">
              <input
                type="radio"
                style="margin: 0"
                name="work"
                id="work3"
                value="retired"
                disabled
              />
              <label style="color: #023b67; font-weight: 400" for="work3"
                >Retired</label
              >
            </div>
            <div class="" style="display: flex; align-items: center; gap: 10px">
              <input
                type="radio"
                style="margin: 0"
                name="work"
                id="work4"
                value="business"
                disabled
              />
              <label style="color: #023b67; font-weight: 400" for="work4"
                >Business</label
              >
            </div>
            <div class="" style="display: flex; align-items: center; gap: 10px">
              <input
                type="radio"
                style="margin: 0"
                name="work"
                id="work5"
                value="other"
                disabled
              />
              <label style="color: #023b67; font-weight: 400" for="work5"
                >Other</label
              >
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td style="display: flex; gap: 5px">
          <p class="label">If Other, please specify</p>
          <div class="border"></div>
        </td>
      </tr>
      <tr>
        <td style="display: flex; gap: 5px">
          <p class="label">Designation</p>
          <div class="border"></div>
        </td>
      </tr>
      <tr>
        <td style="display: flex; gap: 5px">
          <p class="label">Office Address</p>
          <div class="border"></div>
        </td>
      </tr>
      <tr>
        <td style="display: flex; justify-content: space-between; gap: 10px">
          <div class="" style="display: flex; align-items: center">
            <p class="label" style="margin-right: 20px">Office Phone</p>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
          </div>
          <div class="" style="display: flex; align-items: center">
            <p class="label" style="margin-right: 20px">Office Mobile</p>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
          </div>
        </td>
      </tr>
      <tr>
        <td style="display: flex; gap: 5px">
          <p class="label">Office Email ID</p>
          <div class="border"></div>
        </td>
      </tr>
      <tr>
        <td style="display: flex; gap: 30px">
          <p class="label">Membership in JCI</p>
          <div
            class=""
            style="
              display: flex;
              gap: 30px;
              align-items: center;
              justify-content: space-around;
            "
          >
            <div class="" style="display: flex; align-items: center; gap: 10px">
              <input
                type="radio"
                style="margin: 0"
                name="membership"
                id="membership1"
                value="yes"
                checked
                disabled
              />
              <label style="color: #023b67; font-weight: 400" for="membership1"
                >YES</label
              >
            </div>
            <div class="" style="display: flex; align-items: center; gap: 10px">
              <input
                type="radio"
                style="margin: 0"
                name="membership"
                id="membership2"
                value="no"
                disabled
              />
              <label style="color: #023b67; font-weight: 400" for="membership2"
                >NO</label
              >
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td style="padding: 0">If yes, input details</td>
      </tr>
      <tr style="display: flex; width: 100%; gap: 10px">
        <td style="display: flex; gap: 5px">
          <p class="label" style="font-weight: 400">Local Organization</p>
          <div class="border" style="width: 15rem"></div>
        </td>
        <td style="display: flex; gap: 5px">
          <p class="label" style="font-weight: 400">Highest Position Served</p>
          <div class="border" style="width: 15rem"></div>
        </td>
        <td style="display: flex; gap: 5px">
          <p class="label" style="font-weight: 400">Year</p>
          <div class="border" style="width: 9rem"></div>
        </td>
      </tr>
      <tr>
        <td style="display: flex; gap: 30px">
          <p class="label">
            Has your membership application ever been rejected by any other
            club/ institution?
          </p>
          <div
            class=""
            style="
              display: flex;
              gap: 30px;
              align-items: center;
              justify-content: space-around;
            "
          >
            <div class="" style="display: flex; align-items: center; gap: 10px">
              <input
                type="radio"
                style="margin: 0"
                name="rejection"
                id="rejection1"
                value="yes"
                checked
                disabled
              />
              <label style="color: #023b67; font-weight: 400" for="rejection1"
                >YES</label
              >
            </div>
            <div class="" style="display: flex; align-items: center; gap: 10px">
              <input
                type="radio"
                style="margin: 0"
                name="rejection"
                id="rejection2"
                value="no"
                disabled
              />
              <label style="color: #023b67; font-weight: 400" for="rejection2"
                >NO</label
              >
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td style="display: flex; gap: 5px">
          <p class="label" style="font-weight: 400">If yes, input details</p>
          <div class="border"></div>
        </td>
      </tr>
      <tr>
        <td style="display: flex; gap: 30px">
          <p class="label">
            Have you ever been punished for any criminal offence?
          </p>
          <div
            class=""
            style="
              display: flex;
              gap: 30px;
              align-items: center;
              justify-content: space-around;
            "
          >
            <div class="" style="display: flex; align-items: center; gap: 10px">
              <input
                type="radio"
                style="margin: 0"
                name="case"
                id="case1"
                value="yes"
                checked
                disabled
              />
              <label style="color: #023b67; font-weight: 400" for="case1"
                >YES</label
              >
            </div>
            <div class="" style="display: flex; align-items: center; gap: 10px">
              <input
                type="radio"
                style="margin: 0"
                name="case"
                id="case2"
                value="no"
                disabled
              />
              <label style="color: #023b67; font-weight: 400" for="case2"
                >NO</label
              >
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td style="display: flex; gap: 5px">
          <p class="label" style="font-weight: 400">If yes, input details</p>
          <div class="border"></div>
        </td>
      </tr>
      <tr>
        <td style="display: flex; gap: 30px">
          <p class="label">Car Owned</p>
          <div
            class=""
            style="
              display: flex;
              gap: 30px;
              align-items: center;
              justify-content: space-around;
            "
          >
            <div class="" style="display: flex; align-items: center; gap: 10px">
              <input
                type="radio"
                style="margin: 0"
                name="car"
                id="car1"
                value="yes"
                checked
                disabled
              />
              <label style="color: #023b67; font-weight: 400" for="car1"
                >YES</label
              >
            </div>
            <div class="" style="display: flex; align-items: center; gap: 10px">
              <input
                type="radio"
                style="margin: 0"
                name="car"
                id="car2"
                value="no"
                disabled
              />
              <label style="color: #023b67; font-weight: 400" for="car2"
                >NO</label
              >
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td style="display: flex; gap: 5px">
          <p class="label" style="font-weight: 400">
            If Yes, Car Registration Number
          </p>
          <div class="border"></div>
        </td>
      </tr>
      <tr>
        <td style="padding: 50px 0">
          <p class="heading" style="padding: 20px 0">
            MEMBERSHIP DETAILS OF OTHER CLUB/ASSOCIATION/FOUNDATION
          </p>
          <table style="width: 100%">
            <thead>
              <th style="text-align: start; width: 30%">Club Name</th>
              <th style="text-align: start; width: 30%">Membership Number</th>
              <th style="text-align: start; width: 30%">
                Type of Membership/Position Held
              </th>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div
                    style="
                      border: 1px solid rgb(156, 156, 156);
                      margin-right: 10px;
                      padding: 15px;
                    "
                  ></div>
                </td>
                <td>
                  <div
                    style="
                      border: 1px solid rgb(156, 156, 156);
                      margin-right: 10px;
                      padding: 15px;
                    "
                  ></div>
                </td>
                <td>
                  <div
                    style="
                      border: 1px solid rgb(156, 156, 156);
                      margin-right: 10px;
                      padding: 15px;
                    "
                  ></div>
                </td>
              </tr>
              <tr>
                <td>
                  <div
                    style="
                      border: 1px solid rgb(156, 156, 156);
                      margin-right: 10px;
                      padding: 15px;
                    "
                  ></div>
                </td>
                <td>
                  <div
                    style="
                      border: 1px solid rgb(156, 156, 156);
                      margin-right: 10px;
                      padding: 15px;
                    "
                  ></div>
                </td>
                <td>
                  <div
                    style="
                      border: 1px solid rgb(156, 156, 156);
                      margin-right: 10px;
                      padding: 15px;
                    "
                  ></div>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
      <tr>
        <td>
          <p class="heading">SPOUSE DETAILS</p>
        </td>
      </tr>
      <tr>
        <td style="display: flex; gap: 5px">
          <p class="label">Name</p>
          <div class="border"></div>
        </td>
      </tr>
      <tr>
        <td style="display: flex; justify-content: space-between; gap: 10px">
          <div class="" style="display: flex; align-items: center">
            <p class="label" style="margin-right: 20px">Date of Birth</p>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="divider"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="divider"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
          </div>
          <div class="" style="display: flex; align-items: center">
            <p class="label" style="margin-right: 20px">Mobile Number</p>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <p class="heading">INFORMATION OF NOMINEE</p>
        </td>
      </tr>
      <tr>
        <td>
          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px">
            <div style="display: flex">
              <p class="label">Name</p>
              <div class="border"></div>
            </div>
            <div style="display: flex">
              <p class="label">Relationship</p>
              <div class="border"></div>
            </div>
            <div style="display: flex">
              <p class="label">Adress</p>
              <div class="border"></div>
            </div>
            <div style="display: flex; gap: 20px">
              <p class="label">Mobile Number</p>
              <div style="display: flex; gap: 2px">
                <div class="cell"></div>
                <div class="cell"></div>
                <div class="cell"></div>
                <div class="cell"></div>
                <div class="cell"></div>
                <div class="cell"></div>
                <div class="cell"></div>
                <div class="cell"></div>
                <div class="cell"></div>
                <div class="cell"></div>
                <div class="cell"></div>
              </div>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <p class="heading">INFORMATION OF DEPENDENTS</p>
          <table class="education">
            <thead>
              <th style="width: 20%">Name</th>
              <th style="width: 20%">Date of Birth</th>
              <th style="width: 20%">Blood Group</th>
              <th style="width: 20%">Occupation</th>
              <th style="width: 20%">NID (if any)</th>
            </thead>
            <tbody>
              <tr>
                <td height="20"></td>
                <td height="20"></td>
                <td height="20"></td>
                <td height="20"></td>
                <td height="20"></td>
              </tr>
              <tr>
                <td height="20"></td>
                <td height="20"></td>
                <td height="20"></td>
                <td height="20"></td>
                <td height="20"></td>
              </tr>
              <tr>
                <td height="20"></td>
                <td height="20"></td>
                <td height="20"></td>
                <td height="20"></td>
                <td height="20"></td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
      <tr>
        <td>
          <p class="heading">BANK DETAILS</p>
        </td>
      </tr>
      <tr>
        <td style="display: flex; gap: 5px">
          <p class="label">Bank Name</p>
          <div class="border"></div>
        </td>
      </tr>
      <tr>
        <td style="display: flex; gap: 5px">
          <p class="label">Branch Name</p>
          <div class="border"></div>
        </td>
      </tr>
      <tr>
        <td style="display: flex; gap: 5px">
          <p class="label">Account No.</p>
          <div class="border"></div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="" style="display: flex; gap: 10px; width: 100%">
            <div style="display: flex; gap: 5px; width: 100%; align-items: end">
              <p class="label">Cheque No.</p>
              <div class="border"></div>
            </div>
            <div class="" style="display: flex; align-items: center; gap: 2px">
              <p class="label" style="margin-right: 5px">Cheque (Date)</p>
              <div class="cell"></div>
              <div class="cell"></div>
              <div class="divider"></div>
              <div class="cell"></div>
              <div class="cell"></div>
              <div class="divider"></div>
              <div class="cell"></div>
              <div class="cell"></div>
              <div class="cell"></div>
              <div class="cell"></div>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td style="display: flex; gap: 5px">
          <p class="label">Amount</p>
          <div class="border"></div>
        </td>
      </tr>
      <tr>
        <td>
          <p class="heading">PLEASE READ INSTRUCTIONS CAREFULLY</p>
        </td>
      </tr>
      <tr>
        <td>
          <ol>
            <li>
              The amount payable along with the application form should be
              remitted by Crossed Cheque or Bank Draft in favor of CLUB JCI
              Limited,
            </li>
            <li>
              The Executive Committee reserves the right to accept or reject any
              membership application without assigning any reason,
            </li>
            <li>
              Only spouse and children below 18 yeara are entitled to Dependent
              Memberahip and no other friends and or relatives are entitled for
              the same,
            </li>
            <li>
              Members are bound to guide by the rules and regulations and
              by-laws of B Charge in force and duly amended from time to
              time,
            </li>
            <li>
              Members should furnish their change of addresses, telephone
              numbers etc. to keep members record up to date,
            </li>
            <li>
              I understand that the offer is subject to the approvals,
              restrictions, restrain is in impediments etc. I further understand
              that the liability for any delay/default of on account of any such
              restrictions/ imposition shall not be fastened on CLUB JCI
              Limited.
            </li>
            <li>
              The management t of the B Charge ha all rights to cancel
              the memberhip of any member for breaching of any regulations and
              the said member is not liable for any refund of membership fee
              management from time to time.
            </li>
            <li>
              The decision of the management of B Charge would be final
              in all matters relating to admission of members.
            </li>
            <li>
              Free the Competed authority of B Charge my change the
              existing policy, laws & by-laws-laws from time to time.
            </li>
          </ol>
        </td>
      </tr>
      <tr>
        <td style="border-bottom: 1px solid black; padding-bottom: 40px">
          <div
            style="
              display: grid;
              grid-template-columns: 1fr 1fr;
              gap: 40px;
              align-items: end;
            "
          >
            <div
              class=""
              style="
                display: flex;
                flex-direction: column;
                gap: 40px;
                width: 100%;
              "
            >
              <div style="display: flex">
                <p class="label">Date</p>
                <div class="border"></div>
              </div>
              <div style="display: flex">
                <p class="label">place</p>
                <div class="border"></div>
              </div>
            </div>
            <div style="display: block">
              <div class="border"></div>
              <p class="label" style="margin-top: 5px">
                Date Signature of the Applicant
              </p>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td style="padding-top: 40px; display: flex">
          <p class="label">Plase attach</p>
          <div class="">
            <ol style="margin: 0">
              <li>
                Two copies of passport size photo each (applicants, spouse and
                children)
              </li>
              <li>
                NID cop of applicant, spouse and birth certificate of children
              </li>
              <li>Cop of eTIN/TIN certificate</li>
            </ol>
            <p class="" style="margin: 10px 0 0 25px">
              Original documents are to be shown during application submission
              for verification purposes only
            </p>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px">
            <div style="display: flex">
              <p class="label">Proposed By</p>
              <div class="border"></div>
            </div>
            <div style="display: flex">
              <p class="label">Seconded By</p>
              <div class="border"></div>
            </div>
            <div
              style="display: flex; flex-direction: column; margin-top: 40px"
            >
              <div class="border"></div>
              <p class="label">Signature</p>
            </div>
            <div
              style="display: flex; flex-direction: column; margin-top: 40px"
            >
              <div class="border"></div>
              <p class="label">Signature</p>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div
            style="
              display: grid;
              grid-template-columns: 1fr 1fr;
              gap: 40px;
              margin-top: 40px;
              border-bottom: 1px solid black;
              border-bottom-style: dashed;
              padding-bottom: 80px;
              margin-bottom: 40px;
            "
          >
            <div style="display: flex">
              <p class="label">Name</p>
              <div class="border"></div>
            </div>
            <div style="display: flex">
              <p class="label">Name</p>
              <div class="border"></div>
            </div>
            <div style="display: flex">
              <p class="label">Membership No.</p>
              <div class="border"></div>
            </div>
            <div style="display: flex">
              <p class="label">Membership No.</p>
              <div class="border"></div>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <p class="heading">FOR OFFICE USE</p>
        </td>
      </tr>
      <tr>
        <td>
          <div
            style="
              display: grid;
              grid-template-columns: 1fr 1fr;
              gap: 40px;
              border-bottom: 1px solid black;
              padding-bottom: 60px;
            "
          >
            <div style="display: flex; flex-direction: column; gap: 20px">
              <div style="display: flex">
                <p class="label">Serial No.</p>
                <div class="border"></div>
              </div>
              <div style="display: flex">
                <p class="label">Date</p>
                <div class="border"></div>
              </div>
            </div>
            <div style="display: flex; flex-direction: column; gap: 20px">
              <div style="display: flex">
                <p class="label">Verification by</p>
                <div class="border"></div>
              </div>
              <div style="display: flex">
                <p class="label">Date</p>
                <div class="border"></div>
              </div>
            </div>
            <div
              style="
                display: flex;
                flex-direction: column;
                gap: 20px;
                margin-top: 40px;
              "
            >
              <div style="display: flex; flex-direction: column">
                <div class="border"></div>
                <p class="" style="margin: 5px 0">
                  Signature of Club Secretary
                </p>
              </div>
              <div style="display: flex">
                <p class="label">Date</p>
                <div class="border"></div>
              </div>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <p class="label" style="font-size: 20px; margin-top: 40px">
            Membership approved by the EC
          </p>
        </td>
      </tr>
      <tr>
        <td>
          <div
            style="
              display: grid;
              grid-template-columns: 1fr 1fr;
              gap: 40px;
              border-bottom: 1px solid black;
              padding-bottom: 60px;
            "
          >
            <div
              class=""
              style="display: flex; gap: 20px; flex-direction: column"
            >
              <div style="display: flex">
                <p class="label">Date</p>
                <div class="border"></div>
              </div>
              <div style="display: flex">
                <p class="label">Membership No</p>
                <div class="border"></div>
              </div>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td style="padding-top: 120px">
          <div
            style="
              display: grid;
              grid-template-columns: 1fr 1fr;
              gap: 40px;
              align-items: end;
            "
          >
            <div style="display: flex">
              <p class="label">Date</p>
              <div class="border"></div>
            </div>
            <div style="display: block">
              <div class="border"></div>
              <p class="label" style="margin-top: 5px">
                Signature of President
              </p>
            </div>
          </div>
        </td>
      </tr>
    </table>
  </body>
</html>
<?php /**PATH D:\laragon\www\club-management-system\resources\views/frontend/profile/pdf/profile-pdf2.blade.php ENDPATH**/ ?>
