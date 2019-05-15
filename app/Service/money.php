<?php


namespace App\Service;


class money
{
    function fmoney($num) {
        $num=0+$num;
        $num = sprintf("%.02f",$num);
        if(strlen($num) <= 6) return $num;
//从最后开始算起，每3个数它加一个","
        for($i=strlen($num)-1,$k=1, $j=100; $i >= 0; $i--,$k++) {
            $one_num = substr($num,$i,1);
            if($one_num ==".") {
                $numArray[$j--] = $one_num;
                $k=0;
                continue;
            }

            if($k%3==0 and $i!=0) {
//如果正好只剩下3个数字，则不加','
                $numArray[$j--] = $one_num;
                $numArray[$j--] = ",";
                $k=0;
            } else {
                $numArray[$j--]=$one_num;
            }
        }
        ksort($numArray);
        return join("",$numArray);
    }




    function umoney($num,$type="usd") {
        global $numTable,$commaTable,$moneyType;

//global $numTable;
        $numTable[0]="ZERO ";
        $numTable[1]="ONE ";
        $numTable[2]="TWO ";
        $numTable[3]="THREE ";
        $numTable[4]="FOUR ";
        $numTable[5]="FIVE ";
        $numTable[6]="SIX ";
        $numTable[7]="SEVEN ";
        $numTable[8]="EIGHT ";
        $numTable[9]="NINE ";
        $numTable[10]="TEN ";
        $numTable[11]="ELEVEN ";
        $numTable[12]="TWELVE ";
        $numTable[13]="THIRTEEN ";
        $numTable[14]="FOURTEEN ";
        $numTable[15]="FIFTEEN ";
        $numTable[16]="SIXTEEN ";
        $numTable[17]="SEVENTEEN ";
        $numTable[18]="EIGHTEEN ";
        $numTable[19]="NINETEEN ";
        $numTable[20]="TWENTY ";
        $numTable[30]="THIRTY ";
        $numTable[40]="FORTY ";
        $numTable[50]="FIFTY ";
        $numTable[60]="SIXTY ";
        $numTable[70]="SEVENTY ";
        $numTable[80]="EIGHTY ";
        $numTable[90]="NINETY ";

        $commaTable[0]="HUNDRED ";
        $commaTable[1]="THOUSAND ";
        $commaTable[2]="MILLION ";
        $commaTable[3]="MILLIARD ";
        $commaTable[4]="BILLION ";
        $commaTable[5]="????? ";

//单位
        $moneyType["usd"]="U.S. DOLLARS ";
        $moneyType["usd_1"]="CENTS ONLY";
        $moneyType["rmb"]="YUAN ";
        $moneyType["rmb_1"]="FEN ONLY";


        if($type=="") $type="usd";
        $fnum = $this->fmoney($num);
        $numArray = explode(",",$fnum);
        $resultArray = array();
        $k=0;
        $cc=count($numArray);
        for($i = 0; $i < count($numArray); $i++) {
            $num_str = $numArray[$i];
//echo "<br>";
//小数位的处理400.21
            preg_match("~\.~",$num_str,$match);
            if(count($match)) {
                $dotArray = explode(".",$num_str);
                if($dotArray[1] != 0) {
                    $resultArray[$k++]=$this->format3num($dotArray[0]+0);
                    $resultArray[$k++]=$moneyType[strtolower($type)];
                    $resultArray[$k++]="AND ";
                    $resultArray[$k++]=$this->format3num($dotArray[1]+0);
                    $resultArray[$k++]=$moneyType[strtolower($type)."_1"];
                } else {
                    $resultArray[$k++]=$this->format3num($dotArray[0]+0);
                    $resultArray[$k++]=$moneyType[strtolower($type)];
                }
            } else {
//非小数位的处理
                if(($num_str+0)!=0) {
                    $resultArray[$k++]=$this->format3num($num_str+0);
                    $resultArray[$k++]=$commaTable[--$cc];
//判断：除小数外其余若不为零则加and
                    for($j=$i; $j <= $cc; $j++) {
//echo "<br>";
//echo $numArray[$j];
                        if($numArray[$j] !=0) {
                            $resultArray[$k++]="AND ";
                            break;
                        }
                    }
                }
            }
        }
        return join("",$resultArray);
    }



    function format3num($num) {
        global $numTable,$commaTable;
        $numlen = strlen($num);
        for($i = 0,$j = 0;$i < $numlen; $i++) {
            $bitenum[$j++] = substr($num,$i,1);
        }
        if($num==0) return "";
        if($numlen == 1) return $numTable[$num];
        if($numlen == 2) {
            if($num <= 20) return $numTable[$num];
//第一位不可能零
            if($bitenum[1]==0) {
                return $numTable[$num];
            } else {
                return trim($numTable[$bitenum[0]*10])."-".$numTable[$bitenum[1]];
            }

        }
//第一个不可能为零
        if($numlen == 3) {
            if($bitenum[1]==0 && $bitenum[2]==0) {
//100
                return $numTable[$bitenum[0]].$commaTable[0];
            } elseif($bitenum[1]==0) {
//102
                return $numTable[$bitenum[0]].$commaTable[0].$numTable[$bitenum[2]];
            } elseif ($bitenum[2]==0) {
//120
                return $numTable[$bitenum[0]].$commaTable[0].$numTable[$bitenum[1]*10];
            } else {
//123
                return $numTable[$bitenum[0]].$commaTable[0].trim($numTable[$bitenum[1]*10])."-".$numTable[$bitenum[2]];
            }
        }
        return $num;
    }
    function num_to_rmb($num){

        $c1 = "零壹贰叁肆伍陆柒捌玖";

        $c2 = "分角元拾佰仟万拾佰仟亿";

        //精确到分后面就不要了，所以只留两个小数位

        $num = round($num, 2);

        //将数字转化为整数

        $num = $num * 100;

        if (strlen($num) > 10) {

            return "金额太大，请检查";

        }

        $i = 0;

        $c = "";

        while (1) {

            if ($i == 0) {

                //获取最后一位数字

                $n = substr($num, strlen($num)-1, 1);

            } else {

                $n = $num % 10;

            }

            //每次将最后一位数字转化为中文

            $p1 = substr($c1, 3 * $n, 3);

            $p2 = substr($c2, 3 * $i, 3);

            if ($n != '0' || ($n == '0' && ($p2 == '亿' || $p2 == '万' || $p2 == '元'))) {

                $c = $p1 . $p2 . $c;

            } else {

                $c = $p1 . $c;

            }

            $i = $i + 1;

            //去掉数字最后一位了

            $num = $num / 10;

            $num = (int)$num;

            //结束循环

            if ($num == 0) {

                break;

            }

        }

        $j = 0;

        $slen = strlen($c);

        while ($j < $slen) {

            //utf8一个汉字相当3个字符

            $m = substr($c, $j, 6);

            //处理数字中很多0的情况,每次循环去掉一个汉字“零”

            if ($m == '零元' || $m == '零万' || $m == '零亿' || $m == '零零') {

                $left = substr($c, 0, $j);

                $right = substr($c, $j + 3);

                $c = $left . $right;

                $j = $j-3;

                $slen = $slen-3;

            }

            $j = $j + 3;

        }

        //这个是为了去掉类似23.0中最后一个“零”字

        if (substr($c, strlen($c)-3, 3) == '零') {

            $c = substr($c, 0, strlen($c)-3);

        }

        //将处理的汉字加上“整”

        if (empty($c)) {

            return "零元整";

        }else{

            return $c . "整";

        }

    }
}
