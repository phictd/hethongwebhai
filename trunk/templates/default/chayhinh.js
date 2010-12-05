// JavaScript Document
i=1;
dshinh=new Array();
dshinh1=new Array();
dshinh=["h1.jpg","h2.jpg","h3.jpg","h4.jpg"];
dshinh1=["a1.jpg","a2.jpg","a3.jpg","a4.jpg"];
dshinh2=["b1.jpg","b2.jpg","b3.jpg","b4.jpg"];
n=3;
function chuyenhinh()
{	h.filters.blendTrans.apply();
	h1.filters.Chroma.apply();
	h2.filters.blendTrans.apply();
	document.h.src="images/laptop/hinh/" + dshinh[i];
	document.h1.src="images/laptop/anh/" + dshinh1[i];
	document.h2.src="images/laptop/hinh1/" + dshinh2[i];
	h.filters.blendTrans.play();
	h1.filters.Chroma.play();
	h2.filters.blendTrans.play();
	i++;
	if (i>n)
	 { i=0; }
	setTimeout("chuyenhinh()",3000);
}
window.onload=chuyenhinh;