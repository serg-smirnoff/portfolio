<?php
class TextProductWriter extends ShopProductWriter{
   public function write() {
      $str = "??????:\n";
      foreach ( $this->products as $shopProduct ) {
         $str .= $shopProduct->getSummaryLine()."\n";
      }
      print $str;
   }
}
?>