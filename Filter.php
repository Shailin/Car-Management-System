<?php
 $title= "Select Cars";
 $excss="css/tabletab.css";
 $jsfile="js/contentslide.js";

require('Model/CarController.php');
 $carController = new CarController();

 $content = "
      <div class='back'></div>

      <div class='floatname'><h1>Select New Cars</h1></div>
      <div clear='both'></div>

      <div>
       <div class='tabbar'>
          <div class='tabs'>
                <a class='tab1' onclick='Selecttab(1);return false;'> Select by Brand</a>
                <a href='#' class='tab1' onclick='Selecttab(2);return false;'> Price </a>
                <a href='#' class='tab1' onclick='Selecttab(3);return false;'> Select by Type</a>
                <a href='#' class='tab1' onclick='Selecttab(4);return false;'>Mixed Search</a>
          </div>
        <hr class='tabHr'/>
       </div>
      </div>

      <div class='maintable'>
      <div class='content_switcher ' id='content1'>
           <table  border=0 cellpadding=2 cellspacing=5 bgcolor=#adacac align=center width=1000px>
           <tr>
                <td>
                  <div id='imgbox'><a href='honda.html'><img src='images\honda_logo.jpg' alt='honda'></a>
                     <br> Honda
                  </div>
                  <div id='imgbox'><a href='chevrolet.html'><img src='images\chevr_logo.jpg'  alt='chevrolet'></a>
                     <br> Chevrolet
                  </div>
                  <div id='imgbox'><a href='#'><img src='images\ourford_logo.jpg'        alt='ford'></a>
                     <br> Ford
                  </div>
                  <div id='imgbox'><a href='maruti.html'><img src='images\maruti_s_logo.jpg'       alt='maruti'></a>
                     <br> Maruti Suzuki
                  </div>

                  <div id='imgbox'><a href='#'><img src='images\hyundai_logo.jpg'       alt='Hyundai'></a>
                     <br> Hyundai
                  </div>
                  <div id='imgbox'><a href='audi.html'><img src='images\audi_logo.jpg'           alt='audi'></a>
                     <br> Audi
                  </div>
                  <div id='imgbox'><a href='bmw.html'><img src='images\bmw_logo.jpg'       alt='bmw'></a>
                     <br> BMW
                  </div>
                  <div id='imgbox'><a href='ferrari.html'><img src='images\ourferrari_logo.jpg'            alt='ferrari'></a>
                     <br> Ferrari
                  </div>
                </td>
           </tr>
           </table>
        </div>

       <div class='content_switcher' id='content2'>
           <form action ='select_car.php' method = 'post' width = '600px'>
           <table  border=0 cellpadding=2 cellspacing=5 bgcolor=#eeeeee align=center width=1000px>
            <tr>
             <th>Please select Price:</th>
               <td><select name='price'>
                 <option value='%'>All</option>
                 <option value='5'>1-5 Lakhs</option>
                 <option value='10'>5.0-10 Lakhs</option>
                 <option value='15'>10.0-15 Lakhs</option>
                 <option value='30'>15.0-30 Lakhs</option>
                 <option value='300'>30 Above</option>
                 </select>
              </td>
            </tr>
            <tr><th><input id='button'  type ='submit' value ='Search'     /></th></tr>
          </table>
         </form>
        </div>

        <div class='content_switcher' id='content3'>
             <form action ='select_car.php' method = 'post' width = '600px'>
             <table  border=0 cellpadding=2 cellspacing=5 bgcolor=#eeeeee align=center width=1000px>
              <tr rowspan=4>
                <th>Please select car type:</th>
                <td><select name='type'>
                    <option value='%'>All</option>
                    <option value='hatchback'>hatchback</option>
                    <option value='Sedan'>Sedan</option>
                    <option value='Suv'>SUV</option>
                    <option value='Muv'>MUV</option>
                    </select>
                </td>
              </tr>
              <tr><th><input  id='button' type ='submit' value = 'Search' /></th></tr>
             </table>
           </form>
        </div>


       <div class='content_switcher' id='content4'>
           <form action ='select_car.php' method = 'post' width = '600px' style='bgcolor=#eeeeee;'>
           <table  border=0 cellpadding=2 cellspacing=5 bgcolor=#eeeeee align=center width=1000px>


                <tr>
                   <th>Please select Brand</th>
                       <td><p>".$carController->CreateCarBrandDropdown() ."</p></td>
                </tr>

                <tr>
                 <th>Please select Price:</th>
                   <td><select name='price'>
                     <option value='%'>All</option>
                     <option value='5'>1-5 Lakhs</option>
                     <option value='10'>5.0-10 Lakhs</option>
                     <option value='15'>10.0-15 Lakhs</option>
                     <option value='30'>15.0-30 Lakhs</option>
                     <option value='300'>30 Above</option>
                     </select>
                  </td>
                </tr>

                <tr rowspan=4>
                    <th>Please select car type:</th>
                    <td> ". $carController->CreateCarDropdownList() ."</td>
                </tr>

            <tr><th><input id='button'  type ='submit' value ='Search'     /></th></tr>
          </table>
         </form>
        </div>

      </div>
      </div>
  ";

include 'CarTemplate.php';
?>