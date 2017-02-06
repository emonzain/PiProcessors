var ServiceVM = function(model)
{
	var self = this;
	
	self.Name = ko.observable(model.ServiceName);
	self.Status = ko.observable(model.ServiceStatus)
	self.Desc = ko.observable(model.ServiceDesc);
	
    self.IsActive = ko.observable(model.IsActive);
    self.IsRunning = ko.observable(model.IsRunning);
    self.IsLoaded = ko.observable(model.IsLoaded);
	
	
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
		if(self.IsActive)
			self.StopService();
		else
			self.RunService();		
	}
	
}
