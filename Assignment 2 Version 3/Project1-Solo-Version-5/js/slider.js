/*
File Name: slider.js
Author Name: Jordan Cooper
Website Name: index.HTML
Description: This is the javascript code for creating a slider
the slider, the slider automatially iterates through the images from 1-3 fading in and out every 3 seconds
*/

var sliderint = 1;
var sliderNext = 2;

$(document).ready(function(){
	$('#slider > a > img#1').fadeIn(1000);
	startSlider();
							});

function startSlider()
{
	count=$('#slider > a > img').size();
	loop=setInterval(function(){
		
		if(sliderNext > count) // reset the variables when max # of images has been reached
		{
			sliderNext=1;
			sliderint=1;
		}
		
		$('#slider > a > img').fadeOut(1000);
		$('#slider > a > img#' + sliderNext).fadeIn(1000);
		
		sliderint = sliderNext;
		sliderNext = sliderNext + 1; 
		
		},3000)	
}

// go the the previous slider image
function previous()
{
	newSlide = sliderint-1;
	showSlide(newSlide);
}

// go to the next image in the slider
function next()
{	
	newSlide = sliderint+1;
	showSlide(newSlide);
}

// stop the loop, needed when you go forward or backwards, so you dont skip a whole image due to bad timing on the next button
function stopLoop()
{
	window.clearInterval(loop);	
}

// go from one slide to another with next buttons
function showSlide(id)
{
	stopLoop();
	if(id > count) // reset the variables when max # of images has been reached
	{
		id=1;
	}
	else if(id<1)
	{
		id =count;
	}
		
		$('#slider > a > img').fadeOut(1000);
		$('#slider > a > img#' + id).fadeIn(1000);
		
		sliderint = id;
		sliderNext = id + 1; 
		startSlider();
}