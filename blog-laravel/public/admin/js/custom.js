function url_slug(s) {
  s = String(s);
  for (var k in char_map) {
    s = s.replace(RegExp(k, 'g'), char_map[k]);
  }
  var alnum = (typeof(XRegExp) === 'undefined') ? RegExp('[^a-z0-9]+', 'ig') : XRegExp('[^\\p{L}\\p{N}]+', 'ig');
  s = s.replace(alnum, '-');
  return s.toLowerCase();
}
var char_map = {
  'Ա': 'A', 'Բ': 'B', 'Գ': 'G', 'Դ': 'D', 'Ե': 'E', 'Զ': 'Z', 'Է': 'E', 'Ը': 'Y',
  'Թ': 'TH', 'Ժ': 'ZH', 'Ի': 'I', 'Լ': 'L', 'Խ': 'GH', 'Ծ': 'TS', 'Կ': 'K', 'Հ': 'H',
  'Ձ': 'DZ', 'Ղ': 'KH', 'Ճ': 'CH', 'Մ': 'M', 'Յ': 'Y', 'Ն': 'N', 'Շ': 'SH', 'Ո': 'O',
  'Չ': 'Ch', 'Պ': 'P', 'Ջ': 'GH', 'Ռ': 'R', 'Ս': 'S', 'Վ': 'V', 'Տ': 'T', 'Ր': 'R',
  'Ց': 'C','Ու': 'U','Փ': 'P','Ք': 'Q','Եվ': 'YEV','Օ': 'O','Ֆ': 'F',
  'ա': 'a', 'բ': 'b', 'գ': 'g', 'դ': 'd', 'ե': 'e', 'զ': 'z', 'է': 'e', 'ը': 'y',
  'թ': 'th', 'ժ': 'zh', 'ի': 'i', 'լ': 'l', 'խ': 'gh', 'ծ': 'ts', 'կ': 'k', 'հ': 'h',
  'ձ': 'dz', 'ղ': 'kh', 'ճ': 'ch', 'մ': 'm', 'յ': 'y', 'ն': 'n', 'շ': 'sh', 'ո': 'o',
  'չ': 'ch', 'պ': 'p', 'ջ': 'ch', 'ռ': 'r', 'ս': 's', 'վ': 'v', 'տ': 't', 'ր': 'r',
  'ց': 'c','ու': 'u','փ': 'p','ք': 'q','և': 'yev','օ': 'o','ֆ': 'f',
};