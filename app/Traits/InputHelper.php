<?php

namespace App\Traits;

trait InputHelper {

    function fetchStateOptions($selected) 
    {
        $html = '<option value="">State</option>';
        $states = [
             ["AL", "Alabama"],
             ["AK", "Alaska"],
             ["AZ","Arizona"],
             ["AR","Arkansas"],
             ["CA","California"],
             ["CO","Colorado"],
             ["CT","Connecticut"],
             ["DE","Delaware"],
             ["DC","Dist of Columbia"],
             ["FL","Florida"],
             ["GA","Georgia"],
             ["HI","Hawaii"],
             ["ID","Idaho"],
             ["IL","Illinois"],
             ["IN","Indiana"],
             ["IA","Iowa"],
             ["KS","Kansas"],
             ["KY","Kentucky"],
             ["LA","Louisiana"],
             ["ME","Maine"],
             ["MD","Maryland"],
             ["MA","Massachusetts"],
             ["MI","Michigan"],
             ["MN","Minnesota"],
             ["MS","Mississippi"],
             ["MO","Missouri"],
             ["MT","Montana"],
             ["NE","Nebraska"],
             ["NV","Nevada"],
             ["NH","New Hampshire"],
             ["NJ","New Jersey"],
             ["NM","New Mexico"],
             ["NY","New York"],
             ["NC","North Carolina"],
             ["ND","North Dakota"],
             ["OH","Ohio"],
             ["OK","Oklahoma"],
             ["OR","Oregon"],
             ["PA","Pennsylvania"],
             ["RI","Rhode Island"],
             ["SC","South Carolina"],
             ["SD","South Dakota"],
             ["TN","Tennessee"],
             ["TX","Texas"],
             ["UT","Utah"],
             ["VT","Vermont"],
             ["VA","Virginia"],
             ["WA","Washington"],
             ["WV","West Virginia"],
             ["WI","Wisconsin"],
             ["WY","Wyoming"]
         ];
    
       foreach ($states as $s) {
          $html .= '<option '.($selected == $s[0] ? 'selected ' : '').'value="' . $s[0] . '">' . $s[1] . "</option>\n";
       }
       
       return $html;
    
    }
    
}