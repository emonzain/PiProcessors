var ServiceVM = function(model)
{
	var self = this;
	
	self.Name = ko.observable(model.ServiceName);
	self.Status = ko.observable(model.ServiceStatus)
	self.Desc = ko.observable(model.ServiceDesc);
	
    self.IsActive = ko.observable(model.IsActive);
    self.IsRunning = ko.observable(model.IsRunning);
    self.IsLoaded = ko.observable(model.IsLoaded);
	
	
	self.Waiting = ko.observable(false);
	
	self.Timer = null;
	
	
	self.Refresh = function()
	{
		self.Waiting(true);		
		setTimeout(self.EndRefresh, 1000);
	}
	
	self.EndRefresh = function()
	{
		self.Waiting(false);
		
		if(self.Timer != null)
		{
			clearTimeout(self.Timer);
		}
		
		self.Timer = setTimeout(self.Refresh, 5000);
		
	}
	
	
	self.RunService = function()
	{
		alert("run !");
		self.IsRunning(true);
	}
	
	self.StopService = function()
	{
		alert("stop !");
		self.IsRunning(false);
	}
	
	self.ToggleService = function()
	{
		if(self.IsRunning())
			self.StopService();
		else
			self.RunService();		
	}
	
	self.EndRefresh();
}
