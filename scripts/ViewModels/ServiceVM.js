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
		if(!self.IsRunning())
		{
			$.ajax({
			    method: 'POST',
			    dataType: "json",
			    url: "/service/" + self.Name() + "/on",
			    contentType: "application/json",
			    beforeSend: function () {
			    },
			    complete: function () {
				    self.EndRefresh();
			    },
			    success:
				function (allData) {
				    self.IsRunning(true);
				},
			    error: function (XMLHttpRequest, textStatus, errorThrown) {
				alert("Erreur");
				//self.actionEnCoursDocuments(false);
			    }
			});
		}		
	}
	
	self.StopService = function()
	{
		if(self.IsRunning())
		{
			$.ajax({
			    method: 'POST',
			    dataType: "json",
			    url: "/service/" + self.Name() + "/off",
			    contentType: "application/json",
			    beforeSend: function () {
			    },
			    complete: function () {
				    	self.EndRefresh();
			    },
			    success:
				function (allData) {
					self.IsRunning(false);
				},
			    error: function (XMLHttpRequest, textStatus, errorThrown) {
				alert("Erreur");
				//self.actionEnCoursDocuments(false);
			    }
			});
		}		
	}
	
	self.ToggleService = function()
	{
		if(self.IsRunning())
			self.StopService();
		else
			self.RunService();		
	}
	
	self.UpdateInfos = function()
	{			
		$.ajax({
			    method: 'POST',
			    dataType: "json",
			    url: "/service/" + self.Name(),
			    contentType: "application/json",
			    beforeSend: function () {
			    },
			    complete: function () {
				    	self.EndRefresh();
			    },
			    success:
				function (allData) {
					alert(allData);
				},
			    error: function (XMLHttpRequest, textStatus, errorThrown) {
				alert("Erreur");
				//self.actionEnCoursDocuments(false);
			    }
			});
	}
	
	
	self.EndRefresh();
}
