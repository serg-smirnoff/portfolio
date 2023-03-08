// Разделители для сериализации (те же, что в CGI::WebIn)
var Div1 = '.';
var Div2 = '.';

// Функция сериализации, совместимая с CGI::WebIn::Serialize
// Вложенные ссылки игнорируются.
function Serialize(v)
{ return "L1"+Div1+SerializeWO(v);
}

// Функция десериализации.
// Вложенные ссылки игнорируются.
function Unserialize(v)
{ var sb=new StringBuffer(v);
  if(sb.first(1)=='L') sb.shiftTill(Div2);
  return UnserializeWO(sb);
}

function UnserializeWO(sb)
{
  if(sb.first(1)=='r') sb.shift(1);
  var type=sb.first(1);
  if(type=='L' || type=='H') {
    // Массив
    sb.shift(1);
    if(sb.first(1)=='L') sb.shift(1);
    var n=sb.shiftTill(Div2);
    var len = parseInt(n);
    var a=new Array(len);
    for(var i=0; i<len; i++) {
      a[i]=UnserializeWO(sb);
    }
    // если хэш, то преобразуем
    if(type=='H') {
      var h=new Hashtable();
      for(var i=0; i<a.length; i+=2) h[a[i]]=a[i+1];
      return h;
    } else {
      return a;
    }
  } else {
    // Строка
    var n=sb.shiftTill(Div1);
    var len = parseInt(n);
    var s=sb.shift(len);
    return s;
  }
 
}

function SerializeWO(v)
{
  if (v==null || typeof v=='number' || typeof v=='string') {
    if(v==null) v="";
    return (""+v).length+Div1+(""+v);
  } else if(v instanceof Array) {
    var s="rL"+v.length+Div2;
    for(var i=0; i<v.length; i++) {
      s+=SerializeWO(v[i]);
    }
    return s;
  } else {
    var a=new Array();
    for(var k in v) {
      if(v[k]==null) continue;
      a[a.length++]=k;
      a[a.length++]=v[k];
    }
    var s="rHL"+a.length+Div2;
    for(var i=0; i<a.length; i++) {
      s+=SerializeWO(a[i]);
    }
    return s;
  }
}

// Строковой буфер с возможностью сдвига влево.
function StringBuffer(s)
{        this.s=''+s;
        this.shift=StringBuffer_shift;
        this.shiftTill=StringBuffer_shiftTill;
        this.first=StringBuffer_first;
}

function StringBuffer_shift(n)
{        var s=this.s.substr(0,n);
        this.s=this.s.substr(n);
        return s;
}

function StringBuffer_shiftTill(s)
{        var p=this.s.indexOf(s);
        var r=this.shift(p);
        this.shift((""+s).length);
        return r;
}

function StringBuffer_first(n)
{        return this.s.substr(0,n);
}